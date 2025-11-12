 <nav class="bg-white border-b-2">
      <div class="px-5 sm:px-7 lg:px-12">
        <div class="relative flex h-24 items-center justify-between">
          <div class="flex items-center justify-between w-full">
            <!-- Logo -->
            <a href="{{ route('berita.index') }}" class="flex shrink-0 items-center">
              <img
                src="{{ asset('images/Logo_DB-removebg-preview.png') }}"
                class="w-20 sm:w-28"
                alt="Your Company"
              />
            </a>

            <!-- Search Form -->
            <form class="block w-full sm:w-8/12 lg:w-4/12 mx-auto">
              <div class="relative">
                <label for="default-search" class="sr-only">Search</label>
                <div
                  class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                >
                  <svg
                    class="w-4 h-4 text-[#556E98]"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 20 20"
                  >
                    <path
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                    />
                  </svg>
                </div>
                <input
                  type="text"
                  id="newsQuery"
                  class="block w-full p-4 ps-11 font-roboto font-normal text-sm text-[#556E98] border-none placeholder:text-[#556E98] placeholder:font-normal rounded-lg bg-[#F3F3F3] focus:ring-[#556E98] focus:ring-2 focus:bg-white"
                  placeholder="Cari Berita..."
                  aria-label="Search for news"
                  required
                />
                <button
                  type="button"
                  id="searchBtn"
                  aria-label="Search"
                  onclick="fetchSearchNews()"
                  class="text-white font-roboto absolute end-2.5 bottom-2 bg-[#556E98] hover:bg-[#556E98] focus:ring-2 focus:outline-none focus:ring-white font-medium rounded-lg text-sm px-4 py-2"
                >
                  Cari
                </button>
              </div>
            </form>

            <!-- Navigation -->
            <div class="hidden lg:ml-6 lg:block">
              <div id="navbarDesktop" class="flex space-x-4">
                <a
                  id="technologyDesktop"
                  href="#technologyNewsContainer"
                  onclick="fetchTechnologyNews()"
                  class="px-5 py-2 text-base font-medium text-[#556E98] hover:bg-[#556E98] hover:text-white rounded-md"
                  aria-current="page"
                >
                  Technology
                </a>
                <a
                  id="sportsDesktop"
                  href="#sportsNewsContainer"
                  onclick="fetchSportsNews()"
                  class="px-5 py-2 text-base font-medium text-[#556E98] hover:bg-[#556E98] hover:text-white rounded-md"
                >
                  Sports
                </a>
                <a
                  id="politicsDesktop"
                  href="#politicsNewsContainer"
                  onclick="fetchPoliticsNews()"
                  class="px-5 py-2 text-base font-medium text-[#556E98] hover:bg-[#556E98] hover:text-white rounded-md"
                >
                  Politics
                </a>
                <a
                  id="entertainmentDesktop"
                  href="#entertainmentNewsContainer"
                  onclick="fetchEntertainmentNews()"
                  class="px-5 py-2 text-base font-medium text-[#556E98] hover:bg-[#556E98] hover:text-white rounded-md"
                >
                  Entertainment
                </a>
                <a
                  id="othersDesktop"
                  href="#othersNewsContainer"
                  onclick="fetchOthersNews()"
                  class="px-5 py-2 text-base font-medium text-[#556E98] hover:bg-[#556E98] hover:text-white rounded-md"
                >
                  More
                </a>
              </div>
            </div>
          </div>

          <div class="relative inset-y-0 left-0 flex items-center lg:hidden">
            <!-- Mobile menu button-->
            <button
              type="button"
              class="relative inline-flex items-center justify-center rounded-md p-2 text-[#556E98] hover:bg-[#556E98] hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset"
              aria-controls="mobile-menu"
              aria-expanded="false"
              id="menuButton"
            >
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <!--
              Icon when menu is closed.

              Menu open: "hidden", Menu closed: "block"
            -->
              <svg
                class="block size-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                aria-hidden="true"
                data-slot="icon"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                />
              </svg>
              <!--
              Icon when menu is open.

              Menu open: "block", Menu closed: "hidden"
            -->
              <svg
                class="hidden size-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                aria-hidden="true"
                data-slot="icon"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M6 18 18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="hidden lg:hidden" id="mobile-menu">
        <div id="navbarMobile" class="space-y-1 px-2 pb-3 pt-2">
          <a
            id="technologyMobile"
            href="#technologyNewsContainer"
            onclick="fetchTechnologyNews()"
            class="block rounded-md px-3 py-2 text-base font-medium text-dark hover:bg-[#556E98] hover:text-white hover:rounded-full"
            >Techonlogy</a
          >
          <a
            id="sportsMobile"
            href="#sportsNewsContainer"
            onclick="fetchSportsNews()"
            class="block rounded-md px-3 py-2 text-base font-medium text-dark hover:bg-[#556E98] hover:text-white hover:rounded-full"
            >Sports</a
          >
          <a
            id="politicsMobile"
            href="#politicsNewsContainer"
            onclick="fetchPoliticsNews()"
            class="block rounded-md px-3 py-2 text-base font-medium text-dark hover:bg-[#556E98] hover:text-white hover:rounded-full"
            >Politics</a
          >
          <a
            id="entertainmentMobile"
            href="#entertainmentNewsContainer"
            onclick="fetchEntertainmentNews()"
            class="block rounded-md px-3 py-2 text-base font-medium text-dark hover:bg-[#556E98] hover:text-white hover:rounded-full"
            >Entertainment</a
          >
          <a
            id="othersMobile"
            href="#othersNewsContainer"
            onclick="fetchOthersNews()"
            class="block rounded-md px-3 py-2 text-base font-medium text-dark hover:bg-[#556E98] hover:text-white hover:rounded-full"
            >More</a
          >
        </div>
      </div>
    </nav>

