
<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8"></div>
    <h1 class="text-center">Cats</h1>

    <table class="yd yf rh">
        <thead>
            <tr>
                <th>Image</th>
                <th>ID</th>
                <th>Name</th>
                <!-- Add more columns as needed -->
                <th>Age</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cats as $cat)
                <tr>
                    <td><img src="{{ $cat->cat_img }}" alt="{{$cat->cat_name}}"></td>
                    <td>{{ $cat->cat_id }}</td>
                    <td>{{ $cat->cat_name }}</td>
                    <!-- Display more cat attributes/columns as needed -->
                    <td>
                        <?php
                            $dateOfBirth = $cat->date_of_birth;
                            $diff = date_diff(date_create($dateOfBirth), date_create());
                            echo $diff->format('%y years %m months %d days');
                        ?>
                    </td>
                    <td>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>