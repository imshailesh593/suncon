<footer class="bg-[#1C1C1C] text-[#FAF7F3]">

  {{-- CTA band --}}
  <div class="border-b border-white/10">
    <div class="max-w-screen-xl mx-auto px-6 lg:px-12 py-20 flex flex-col md:flex-row items-start md:items-end justify-between gap-8">
      <div>
        <p class="text-[#8B8275] text-xs uppercase tracking-[0.2em] mb-4">Ready to build?</p>
        <h2 class="font-display text-display-lg text-[#FAF7F3] leading-none">
          Let's make<br>
          <em class="font-light text-[#B5451B]">something great.</em>
        </h2>
      </div>
      <a href="{{ url('/contact') }}" class="shrink-0 text-xs uppercase tracking-[0.18em] border border-white/30 text-[#FAF7F3] px-8 py-4 hover:bg-[#B5451B] hover:border-[#B5451B] transition-all duration-300">
        Start a Project
      </a>
    </div>
  </div>

  {{-- Links --}}
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 py-16">
    <div class="grid grid-cols-2 lg:grid-cols-[2fr_1fr_1fr_1.5fr] gap-x-10 gap-y-12">

      {{-- Brand --}}
      <div class="col-span-2 lg:col-span-1">
        <a href="{{ url('/') }}" class="font-display text-xl tracking-[0.25em] uppercase text-[#FAF7F3]">Suncon</a>
        <p class="mt-4 text-[#8B8275] text-sm leading-relaxed max-w-xs">ISO-certified multidisciplinary consultancy delivering architecture, landscape &amp; infrastructure across India since 1999.</p>
        <div class="flex flex-wrap gap-x-5 gap-y-2 mt-6">
          @foreach([['Instagram','https://www.instagram.com/sunconengineers'],['LinkedIn','https://www.linkedin.com/company/sunconengineers'],['Facebook','https://www.facebook.com/sunconengineers'],['YouTube','https://www.youtube.com/@SunconEngineers']] as $s)
            <a href="{{ $s[1] }}" target="_blank" rel="noopener noreferrer" class="text-[#8B8275] text-[10px] uppercase tracking-[0.12em] hover:text-[#FAF7F3] transition-colors duration-200">{{ $s[0] }}</a>
          @endforeach
        </div>
      </div>

      {{-- Work --}}
      <div>
        <p class="text-[#8B8275] text-[10px] uppercase tracking-[0.2em] mb-5">Work</p>
        <ul class="flex flex-col gap-3">
          @foreach([['All Projects','/projects'],['Architecture','/projects?discipline=architecture'],['Interior Design','/projects?discipline=interior'],['Infrastructure','/projects?discipline=urban']] as $l)
            <li><a href="{{ url($l[1]) }}" class="text-[#E8E0D4] text-sm hover:text-[#FAF7F3] transition-colors duration-200">{{ $l[0] }}</a></li>
          @endforeach
        </ul>
      </div>

      {{-- Practice --}}
      <div>
        <p class="text-[#8B8275] text-[10px] uppercase tracking-[0.2em] mb-5">Practice</p>
        <ul class="flex flex-col gap-3">
          @foreach([['About','/about'],['Team','/about#team'],['Services','/services'],['Journal','/journal']] as $l)
            <li><a href="{{ url($l[1]) }}" class="text-[#E8E0D4] text-sm hover:text-[#FAF7F3] transition-colors duration-200">{{ $l[0] }}</a></li>
          @endforeach
        </ul>
      </div>

      {{-- Connect --}}
      <div class="col-span-2 lg:col-span-1">
        <p class="text-[#8B8275] text-[10px] uppercase tracking-[0.2em] mb-5">Connect</p>
        <ul class="flex flex-col gap-3">
          @foreach([['Start a Project','/contact'],['bd@sunconengineers.com','mailto:bd@sunconengineers.com'],['+91 93716 54387','tel:+919371654387']] as $l)
            <li><a href="{{ $l[1] }}" class="text-[#E8E0D4] text-sm hover:text-[#FAF7F3] transition-colors duration-200 break-all">{{ $l[0] }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>

    {{-- Bottom bar --}}
    <div class="mt-16 pt-8 border-t border-white/10 flex flex-col sm:flex-row justify-between gap-4 text-[#8B8275] text-xs">
      <p>© {{ date('Y') }} Suncon Engineers Pvt. Ltd. All rights reserved.</p>
      <div class="flex gap-6">
        <a href="{{ url('/privacy') }}" class="hover:text-[#FAF7F3] transition-colors duration-200">Privacy Policy</a>
        <a href="{{ url('/terms') }}"   class="hover:text-[#FAF7F3] transition-colors duration-200">Terms</a>
      </div>
    </div>
  </div>

</footer>
