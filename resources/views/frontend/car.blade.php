<x-layout-frontend>
    <x-slot:title>
        page car
    </x-slot:title>

    <x-navbar />
    <x-space h="40" />
    <div style="min-height: calc(100vh - 80px)">
        <x-container>

            <div class="checkout_box">
                <div class="form">
                    <h2>checkout</h2>
                    <form action="#" method="post">
                        <div class="box">
                            <label for="picktime"> 
                                <i class="material-symbols-outlined">person</i> prénom
                            </label>
                            <input type="text" placeholder="prénom" value="">
                        </div>
                        <div class="box">
                            <label for="picktime"> 
                                <i class="material-symbols-outlined">person</i> prénom
                            </label>
                            <input type="text" placeholder="prénom" value="">
                        </div>
                        <div class="box">
                            <label for="picktime"> 
                                <i class="material-symbols-outlined">phone</i> mobile
                            </label>
                            <input type="text" placeholder="prénom" value="">
                        </div>
                        <div class="box">
                            <label for="picktime"> 
                                <i class="material-symbols-outlined">person</i> prénom
                            </label>
                            <input type="text" name="t" id="my-element-2" placeholder="date de réservation">
                        </div>
                        <div class="box">
                            <button type="submit">rent new</button>
                        </div>
                    </form>
                </div>
                <div class="info">
                    <x-box-car :carInfo="$car" />
                </div>
            </div>

        </x-container>

    </div>
    <x-footer />


</x-layout-frontend>
