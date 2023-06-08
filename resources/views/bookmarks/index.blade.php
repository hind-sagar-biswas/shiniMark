<x-layout :pageTitle="$pageTitle">
    @auth
        @php
            $restriction = auth()->user()->authority;
        @endphp
    @else
        @php
            $restriction = 0;
        @endphp
    @endauth

    @include('partials.filter_form')

    <center>
        <h2> BOOKMARKS
            @auth
                <a href='/bookmarks/add' class="text-danger"><i class="fas fa-bookmark"></i></a>
            @endauth
        </h2>
        <p>Stories: <span class="text-danger">{{$bookmarks->total()}}</span></p>
        
        <div class="m-1 p-1">
            {{$bookmarks->links()}}
        </div>

        <x-bookmark-table >

            @unless(count($bookmarks) == 0)
                @foreach ($bookmarks as $bookmark)
                    <x-bookmark :bookmark="$bookmark" />
                @endforeach
            @else 
                <tr>
                    <td colspan="5" align="center">
                        <h5 class="text-danger">No records found!</h5>
                    </td>
                </tr>
            @endunless

        </x-bookmark-table>

        <div class="m-1 p-1">
            {{$bookmarks->links()}}
        </div>
    </center>
</x-layout>