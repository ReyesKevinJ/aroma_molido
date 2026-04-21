<section class="p-5 md:p-0 my-8">
    <div class="grid grid-rows-2 place-content-center">
        <h2>
            <span
                class="text-3xl flex justify-center font-extrabold tracking-tight text-heading sm:text-4xl crimson-pro">Nuestros
                Productos</span>
        </h2>
        <h3>
            <span class="mt-3 text-lg text-body">Explore nuestro catalogo de productos de cafe premium, Elaborado a la
                perfección para
                la mejor experiencia cafetera.</span>
        </h3>
    </div>
    <div
        class="mx-auto max-w-screen-lg 2xl:max-w-screen-2xl grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-6 lg:gap-10 mt-10">
        @foreach ($products as $product )
        <x-product-card :title="$product['title']" :id="$product['id']" :price="$product['price']"
            :description="$product['description']" :image="$product['image']" />
        @endforeach
    </div>
    </div>
</section>
