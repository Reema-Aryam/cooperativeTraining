<x-layouts::site-page :title="__('health-centers.title')">
    <section class="assembly-page" aria-labelledby="health-centers-title">
        <div class="assembly-heading">
            <div>
                <p class="assembly-kicker">{{ __('health-centers.assembly') }}</p>
                <h1 id="health-centers-title">{{ __('health-centers.title') }}</h1>
                <p class="assembly-intro">{{ __('health-centers.intro') }}</p>
            </div>
            <div class="assembly-count" role="status">{{ __('health-centers.count', ['count' => $centers->count(), 'total' => $total]) }}</div>
        </div>

        <form class="assembly-filters" method="GET" action="{{ route('health-centers.index') }}" aria-label="{{ __('health-centers.filters') }}">
            <div class="assembly-search-field">
                <label for="center-search">{{ __('health-centers.search') }}</label>
                <input id="center-search" type="search" name="search" value="{{ $search }}" maxlength="100" placeholder="{{ __('health-centers.placeholder') }}">
            </div>
            <div>
                <label for="center-scope">{{ __('health-centers.scope') }}</label>
                <select id="center-scope" name="scope">
                    <option value="">{{ __('health-centers.all_scopes') }}</option>
                    @foreach ($scopes as $option)
                        <option value="{{ $option }}" @selected($scope === $option)>{{ $option }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="center-governorate">{{ __('health-centers.governorate') }}</label>
                <select id="center-governorate" name="governorate">
                    <option value="">{{ __('health-centers.all_governorates') }}</option>
                    @foreach ($governorates as $option)
                        <option value="{{ $option }}" @selected($governorate === $option)>{{ $option }}</option>
                    @endforeach
                </select>
            </div>
            <button class="button button-primary" type="submit">{{ __('health-centers.apply') }}</button>
            <a class="text-link dark" href="{{ route('health-centers.index') }}">{{ __('health-centers.reset') }}</a>
        </form>

        <div class="assembly-table-wrap">
            <table class="assembly-table">
                <caption class="sr-only">{{ __('health-centers.caption') }}</caption>
                <thead>
                    <tr>
                        <th scope="col">{{ __('health-centers.region') }}</th>
                        <th scope="col">{{ __('health-centers.governorate') }}</th>
                        <th scope="col">{{ __('health-centers.scope') }}</th>
                        <th scope="col">{{ __('health-centers.name') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($centers as $center)
                        <tr data-scope="{{ $center['scope'] }}">
                            <td>{{ $center['assembly'] }}</td>
                            <td>{{ $center['governorate'] }}</td>
                            <td><span class="scope-badge">{{ $center['scope'] }}</span></td>
                            <td>{{ $center['name'] }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="assembly-empty">{{ __('health-centers.empty') }}</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</x-layouts::site-page>
