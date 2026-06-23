<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // 1. Métricas Superiores (Tarjetas)
        $totalUsers = User::where('role', 'customer')->count();

        // Pedidos del mes actual (puedes cambiar 'count()' por 'sum('total')' si tienes una columna de precio total)
        $salesThisMonth = Order::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('status', 'completado')
            ->count();

        // Pedidos que requieren atención inmediata
        $pendingOrdersCount = Order::whereIn('status', ['pendiente', 'procesando'])->count();

        // 2. Tablas Inferiores
        // Últimos 5 pedidos
        $recentOrders = Order::with('user')
            ->latest('created_at')
            ->take(5)
            ->get();

        // Productos con stock bajo (ejemplo: 5 unidades o menos)
        $lowStockProducts = Product::where('stock', '<=', 5)
            ->orderBy('stock', 'asc')
            ->take(6)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'salesThisMonth',
            'pendingOrdersCount',
            'recentOrders',
            'lowStockProducts'
        ));
    }
}
