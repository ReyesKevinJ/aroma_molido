<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Query;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index(Request $request)
    {
        // Por defecto mostramos los registrados
        $type = $request->get('type', 'registered');
        $searchTerm = $request->search ? '%' . $request->search . '%' : null;

        if ($type === 'guest') {
            // CONSULTAMOS LA TABLA CONTACTS
            $dbQuery = Contact::query();

            $dbQuery->when($searchTerm, function ($q) use ($searchTerm) {
                $q->where(function ($sub) use ($searchTerm) {
                    $sub->where('name', 'like', $searchTerm)
                        ->orWhere('email', 'like', $searchTerm)
                        ->orWhere('message', 'like', $searchTerm);
                });
            });
        } else {
            // CONSULTAMOS LA TABLA QUERIES
            $dbQuery = Query::with('user');

            $dbQuery->when($searchTerm, function ($q) use ($searchTerm) {
                $q->where(function ($sub) use ($searchTerm) {
                    $sub->where('message', 'like', $searchTerm)
                        ->orWhereHas('user', function ($userQuery) use ($searchTerm) {
                            $userQuery->where('name', 'like', $searchTerm)
                                ->orWhere('email', 'like', $searchTerm);
                        });
                });
            });
        }

        // Filtro de fecha
        $dbQuery->when($request->filled('date'), function ($q) use ($request) {
            $q->whereDate('created_at', $request->date);
        });

        // NUEVO: Filtro de Estado (Leído / No leído)
        // Usamos has() y verificamos que no sea un string vacío,
        // porque filled() a veces ignora el '0' nativamente.
        if ($request->has('status') && $request->status !== null && $request->status !== '') {
            $dbQuery->where('status', $request->status);
        }

        // Paginamos
        $messages = $dbQuery->latest('id')->paginate(10)->withQueryString();

        return view('admin.inbox.index', compact('messages', 'type'));
    }

    public function show(String $id, Request $request)
    {
        $type = $request->get('type', 'registered');

        // Buscamos en el modelo correspondiente según el tipo
        if ($type === 'guest') {
            $message = Contact::findOrFail($id);
        } else {
            $message = Query::with('user')->findOrFail($id);
        }
        $message->update(['status' => true]);

        return view('admin.inbox.show', compact('message', 'type'));
    }
}
