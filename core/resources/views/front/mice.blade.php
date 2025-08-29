{{-- /resources/views/front/mice.blade.php --}}
@extends('layouts.header')
@section('title', 'MICE')
@section('description', 'Meetings, Incentives, Conferences & Exhibitions (MICE) services: budgeting, accommodation, transport, venue hire, and travel solutions.')
@section('keywords', 'MICE, corporate events, conferences, incentives, exhibitions, Lebanon')

@section('content')
  {{-- Breadcrumb --}}
  <section class="breadcrumb-outer text-center">
    <div class="container">
      <div class="breadcrumb-content">
        <h2 class="white">MICE</h2>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">MICE</li>
          </ul>
        </nav>
      </div>
    </div>
  </section>

  {{-- Content --}}
  <section class="blogmain blog-fullwidth">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">

          {{-- ========== CMS-driven section(s) like Project Management ========== --}}
          @foreach($mices as $mice)
            <section class="mice-section">
              <div class="mice-section__bar">
                <h3 class="mice-section__title">{{ $mice->name }}</h3>
              </div>

              @php $img = $mice->getFirstMediaUrl('mice', 'thumb-large'); @endphp
              @if($img)
                <div class="mice-hero">
                  <img src="{{ $img }}" alt="{{ $mice->name }}" loading="lazy" width="1200" height="800">
                </div>
              @endif

              @php
                $plain = trim(preg_replace('/\s+/', ' ', str_replace(["\r\n","\r","\n"], "\n", strip_tags($mice->description, '<br><br/>'))));
                $plain = str_replace(['<br>','<br/>','<br />'], "\n", $plain);
                $lines = array_filter(array_map('trim', explode("\n", $plain)), fn($l) => $l !== '');
                $rows = [];
                foreach ($lines as $line) {
                    if (str_contains($line, ':')) { [$k,$v] = explode(':', $line, 2); $rows[] = ['k'=>trim($k), 'v'=>trim($v)]; }
                    elseif (str_contains($line, '—')) { [$k,$v] = explode('—', $line, 2); $rows[] = ['k'=>trim($k), 'v'=>trim($v)]; }
                    else { $rows[] = ['k'=>null, 'v'=>trim($line)]; }
                }
              @endphp

              <div class="mice-table">
                @forelse($rows as $row)
                  @if($row['k'])
                    <div class="mice-row">
                      <div class="mice-label">{{ $row['k'] }}</div>
                      <div class="mice-value">{{ $row['v'] }}</div>
                    </div>
                  @else
                    <div class="mice-row mice-row--note">
                      <div class="mice-value">{{ $row['v'] }}</div>
                    </div>
                  @endif
                @empty
                  <div class="mice-row mice-row--note">
                    <div class="mice-value">{!! $mice->description !!}</div>
                  </div>
                @endforelse
              </div>
            </section>
          @endforeach

          {{-- ========== Hardcoded additional sections ========== --}}

          {{-- Event Setup & Logistics --}}
          <section class="mice-section">
            <div class="mice-section__bar">
              <h3 class="mice-section__title">Event Setup &amp; Logistics</h3>
            </div>
            <div class="mice-table">
              <div class="mice-row"><div class="mice-label">On-Site Staffing</div><div class="mice-value">Event coordinators and ushers, technical support team, and security personnel</div></div>
              <div class="mice-row"><div class="mice-label">Event Decor</div><div class="mice-value">Design concept, furniture rental, thematic elements, and floral arrangements</div></div>
              <div class="mice-row"><div class="mice-label">Tech Setup</div><div class="mice-value">Installation and operation of screens, sound systems, lighting, and audiovisual effects</div></div>
              <div class="mice-row"><div class="mice-label">Catering</div><div class="mice-value">Themed menus, customization options, interactive food stations, and specialty beverages</div></div>
            </div>
          </section>

          {{-- Networking & Engagement --}}
          <section class="mice-section">
            <div class="mice-section__bar">
              <h3 class="mice-section__title">Networking &amp; Engagement</h3>
            </div>
            <div class="mice-table">
              <div class="mice-row"><div class="mice-label">Business Networking Events</div><div class="mice-value">Gala dinners, executive gatherings, themed nights, cultural programs, and entertainment shows</div></div>
              <div class="mice-row"><div class="mice-label">Post-Event Activities</div><div class="mice-value">Team building initiatives, shopping, cruising, sports, and leisure</div></div>
            </div>
          </section>

          {{-- Multimedia & Language Support --}}
          <section class="mice-section">
            <div class="mice-section__bar">
              <h3 class="mice-section__title">Multimedia &amp; Language Support</h3>
            </div>
            <div class="mice-table">
              <div class="mice-row"><div class="mice-label">Digital Branding</div><div class="mice-value">Interactive displays, signages, and banners</div></div>
              <div class="mice-row"><div class="mice-label">Facilitation Services</div><div class="mice-value">Event scribing, note-taking, and moderation</div></div>
              <div class="mice-row"><div class="mice-label">Media Coverage</div><div class="mice-value">Photography, videography, live streaming, and drone footage</div></div>
              <div class="mice-row"><div class="mice-label">Translation &amp; Interpretation</div><div class="mice-value">Translation equipment, booths, headsets, and interpreter services in multiple languages</div></div>
              <div class="mice-row"><div class="mice-label">Printing</div><div class="mice-value">Invitation cards, badges, name tags, stationery, giveaway gifts, backdrops, roll-ups, posters, and brochures</div></div>
            </div>
          </section>

        </div>
      </div>
    </div>
  </section>

  {{-- Styles --}}
  <style>
    .mice-section{
      border-radius:6px; overflow:hidden;
      margin-bottom:36px; background:#fff;
    }
    .mice-section__bar{ background:#40b4e5; padding:16px; text-align:center; }
    .mice-section__title{ color:#fff; margin:0; font-weight:700; font-size:20px; }
    .mice-hero{ border-bottom:1px solid #e8eef3; }
    .mice-hero img{ width:100%; height:auto; display:block; }
    .mice-table{ padding:18px 18px 6px; }
    .mice-row{
      display:grid; grid-template-columns:240px 1fr; gap:24px;
      padding:14px 6px; border-bottom:1px solid #eef3f7;
    }
    .mice-row:last-child{ border-bottom:none; }
    .mice-label{ font-weight:800; color:#121212; font-size:16px; }
    .mice-value{ color:#3a3a3a; line-height:1.55; font-size:15px; }
    .mice-row.mice-row--note{ grid-template-columns:1fr; }
    @media (max-width: 992px){
      .mice-row{ grid-template-columns:1fr; gap:8px; padding:12px 2px; }
      .mice-label{ font-size:15px; }
      .mice-value{ font-size:14px; }
    }
  </style>
@endsection
