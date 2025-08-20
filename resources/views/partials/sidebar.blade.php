<aside class="flex flex-col" :class="{'hidden sm:flex sm:flex-col': window.outerWidth > 768}">
    <a href="#" class="inline-flex items-center justify-center h-10 w-full bg-blue-600 hover:bg-blue-500 focus:bg-blue-500">
      <span class="text-white text-4xl ml-2" x-show="menu">POS</span>
    </a>
    <div class="flex-grow flex flex-col justify-between text-gray-500 bg-gray-800">
      @php
        function navItemClass($routeName) {
            return request()->routeIs($routeName)
                ? 'text-blue-600 bg-white'
                : 'hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 text-white';
        }
      @endphp

      <nav class="flex flex-col mx-4 my-6 space-y-4">
          {{-- Dashboard --}}
          <a href="{{ route('dashboard') }}"
            class="inline-flex items-center py-3 rounded-lg px-2 {{ navItemClass('dashboard') }}"
            :class="{'justify-start': menu, 'justify-center': menu == false}">
              <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
              </svg>
              <span class="ml-2" x-show="menu">Dashboard</span>
          </a>

          {{-- Product --}}
          <a href="{{ route('products.index') }}"
            class="inline-flex items-center py-3 rounded-lg px-2 {{ navItemClass('products.*') }}"
            :class="{'justify-start': menu, 'justify-center': menu == false}">
              <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
              </svg>
              <span class="ml-2" x-show="menu">Product</span>
          </a>
          {{-- Customer --}}
          <a href="{{ route('customers.index') }}"
            class="inline-flex items-center py-3 rounded-lg px-2 {{ navItemClass('customers.*') }}"
            :class="{'justify-start': menu, 'justify-center': menu == false}">
              <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
              </svg>
              <span class="ml-2" x-show="menu">Customer</span>
          </a>
     
          {{-- Sales --}}
          <a href="{{ route('sales.index') }}"
            class="inline-flex items-center py-3 rounded-lg px-2 {{ navItemClass('sales.*') }}"
            :class="{'justify-start': menu, 'justify-center': menu == false}">
              <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
              </svg>
              <span class="ml-2" x-show="menu">Sales</span>
          </a>
      </nav>

    </div>
  </aside>