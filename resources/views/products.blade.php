<x-layouts.app>
    <?php
    $products = [
        [
            'id' => 1,
            'title' => 'Espresso',
            'description' => 'Un café rico e intenso preparado al forzar agua caliente a través de granos de café finamente molidos.',
            'price' => 3.99,
            'image' => 'https://img.freepik.com/fotos-premium/mano-sosteniendo-grano-cafe-forma-corazon-palabras-grano-cafe-centro_862994-517835.jpg'
        ],
        [
            'id' => 2,
            'title' => 'Latte',
            'description' => 'Una bebida de café cremosa hecha con espresso y leche vaporizada, coronada con una fina capa de espuma.',
            'price' => 3.99,
            'image' => 'https://img.freepik.com/fotos-premium/mano-sosteniendo-grano-cafe-forma-corazon-palabras-grano-cafe-centro_862994-517835.jpg'
        ],
        [
            'id' => 3,
            'title' => 'Capuchino',
            'description' => 'Una clásica bebida de café italiana que consiste en partes iguales de espresso, leche vaporizada y espuma de leche.',
            'price' => 3.99,
            'image' => 'https://img.freepik.com/fotos-premium/mano-sosteniendo-grano-cafe-forma-corazon-palabras-grano-cafe-centro_862994-517835.jpg'
        ],
        [
            'id' => 4,
            'title' => 'Americano',
            'description' => 'Una bebida de café sencilla que se prepara diluyendo espresso con agua caliente, lo que resulta en un sabor más suave y un volumen mayor.',
            'price' => 3.99,
            'image' => 'https://img.freepik.com/fotos-premium/mano-sosteniendo-grano-cafe-forma-corazon-palabras-grano-cafe-centro_862994-517835.jpg'
        ],
        [
            'id' => 5,
            'title' => 'Moca',
            'description' => 'Una deliciosa mezcla de espresso, leche vaporizada y sirope de chocolate, a menudo coronada con crema batida.',
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