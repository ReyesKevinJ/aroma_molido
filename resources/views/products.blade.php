<x-layouts.app>
    <?php
    $products = [
        [
            'id' => 1,
            'title' => 'Espresso',
            'description' => 'A rich and intense coffee brewed by forcing hot water through finely-ground coffee beans.',
            'price' => 3.99,
            'image' => 'https://img.freepik.com/fotos-premium/mano-sosteniendo-grano-cafe-forma-corazon-palabras-grano-cafe-centro_862994-517835.jpg'
        ],
        [
            'id' => 2,
            'title' => 'Latte',
            'description' => 'A creamy coffee drink made with espresso and steamed milk, topped with a thin layer of foam.',
            'price' => 3.99,
            'image' => 'https://img.freepik.com/fotos-premium/mano-sosteniendo-grano-cafe-forma-corazon-palabras-grano-cafe-centro_862994-517835.jpg'
        ],
        [
            'id' => 3,
            'title' => 'Cappuccino',
            'description' => 'A classic Italian coffee drink consisting of equal parts espresso, steamed milk, and milk foam.',
            'price' => 3.99,
            'image' => 'https://img.freepik.com/fotos-premium/mano-sosteniendo-grano-cafe-forma-corazon-palabras-grano-cafe-centro_862994-517835.jpg'
        ],
        [
            'id' => 4,
            'title' => 'Americano',
            'description' => 'A simple coffee drink made by diluting espresso with hot water, resulting in a lighter flavor and larger volume.',
            'price' => 3.99,
            'image' => 'https://img.freepik.com/fotos-premium/mano-sosteniendo-grano-cafe-forma-corazon-palabras-grano-cafe-centro_862994-517835.jpg'
        ],
        [
            'id' => 5,
            'title' => 'Mocha',
            'description' => 'A delicious blend of espresso, steamed milk, and chocolate syrup, often topped with whipped cream.',
            'price' => 3.99,
            'image' => 'https://img.freepik.com/fotos-premium/mano-sosteniendo-grano-cafe-forma-corazon-palabras-grano-cafe-centro_862994-517835.jpg'
        ]
    ];
    ?>
    @section('title','- Productos')
    @section('content')
    <x-products :products="$products" />
    @endsection
</x-layouts.app>
