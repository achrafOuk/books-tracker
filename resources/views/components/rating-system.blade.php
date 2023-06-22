@props(['rating'])

<div class="flex items-center mx-auto">
    @for($i=1;$i<= 5;$i++)
        @if($i<=$rating)
            <svg class="w-4 h-4 fill-current text-purple mr-2" viewBox="0 0 20 20">
                <path d="M10 0L13.09 6.31L19.55 7.82L15.81 12.04L16.72 18.19L10 15.29L3.28 18.19L4.19 12.04L0.45 7.82L6.91 6.31L10 0Z"/>
            </svg>
        @else
            <svg class="w-4 h-4 fill-current text-gray-400 mr-2" viewBox="0 0 20 20">
                <path d="M10 0L13.09 6.31L19.55 7.82L15.81 12.04L16.72 18.19L10 15.29L3.28 18.19L4.19 12.04L0.45 7.82L6.91 6.31L10 0Z"/>
            </svg>
        @endif
    @endfor
</div>
