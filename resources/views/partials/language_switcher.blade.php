<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
  @foreach($available_locales as $locale_name => $available_locale)
      @if($available_locale === $current_locale)
          <span class="mx-2 text-gray-700">{{ $locale_name }}</span>
      @else
          <a class="mx-2 underline" href="language/{{ $available_locale }}">
              <span>{{ $locale_name }}</span>
          </a>
      @endif
  @endforeach
</div>