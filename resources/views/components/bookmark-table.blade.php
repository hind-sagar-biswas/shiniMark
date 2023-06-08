<div class="table-responsive-sm">
    <table class="table table-bordered table-hover table-sm">
        <!-- Table head part -->
        <thead class="text-center mx-auto bg-dark" style="font-size: 20px !important; color:aliceblue;">
            <tr>
                <th class="">
                    <i class="fas fa-eye"></i>
                </th>
                <th class="">
                    Name
                </th>
                <th class="">
                    Category
                </th>
                <th class="">
                    Current
                </th>
                <th class="">
                    Latest
                </th>
                <th class="">
                    Status
                </th>
                @auth
                    <th>
                        <i class='fas fa-tasks'></i>
                    </th>
                @endauth
            </tr>
        </thead>

        <!-- Table body part -->
        <tbody class="text-center mx-auto">

            {{$slot}}

        </tbody>
    </table>
</div>