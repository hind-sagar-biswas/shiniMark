@props(['bookmark'])

<tr>
    <!-- Reading status badges -->
    <td>
        @php
            $badgeStyle = 'primary';
            $badgeText = '';
        @endphp

        @if ($bookmark->current == 0)
            @php
                $badgeStyle = 'danger';
                $badgeText = 'pause';
            @endphp
        @elseif ($bookmark->current == $bookmark->latest)
            @php
                $badgeStyle = 'secondary';
                $badgeText = 'check';
            @endphp
        @else
            @php
                $badgeStyle = 'warning';
                $badgeText = 'play';
            @endphp
        @endif

        <span class='badge badge-{{$badgeStyle}}'><i class="fas fa-{{ $badgeText }}"></i></span>
    </td>

    <!-- Bookmark titles -->
    <td align="left">
        &nbsp;&nbsp;
        @if ($bookmark->link != null || !empty($bookmark->link))
            <a href='{{ $bookmark->link }}' target='_blank' class='mngLink'>{{ $bookmark->name }}</a>
        @else
            {{$bookmark->name}}
        @endif
    </td>

    <!-- Category column -->
    <td class="@if ($bookmark->restriction) {{ 'text-danger' }} @endif">
        {{ $bookmark->category }}
    </td>

    <!-- Current and Latest Chapters -->
    <td>{{ $bookmark->current }}</td>
    <td>{{ $bookmark->latest }}</td>

    <!-- Status column -->
    <?php
    $statusTheme = 'primary';
    switch ($bookmark->status) {
        case 'Completed':
            $statusTheme = 'success';
            break;
        case 'Ongoing':
            $statusTheme = 'info';
            break;
        case 'Season End':
            $statusTheme = 'warning';
            break;
        case 'Axed':
            $statusTheme = 'danger';
            break;
    }
    ?>
    <td class="table-{{ $statusTheme }} text-{{ $statusTheme }}">
        {{ $bookmark->status }}
    </td>
    @auth
        <td>
            <div class='btn-group mx auto text-center'>
                <button type='button' class='btn btn-sm btn-danger dropdown-toggle' data-toggle='dropdown'>
                    <i class='fas fa-tasks'></i>
                </button>
                <form class='dropdown-menu p-1' style='border:none; padding:0' action="/bookmarks/{{ $bookmark->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class='dropdown-item drop-secondary' href="/bookmarks/{{ $bookmark->id }}/edit">
                        <i class='fas fa-edit'></i>
                    </a>
                    <button type="submit" class='dropdown-item drop-danger'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>
                </form>
            </div>
        </td>
    @endauth
</tr>