<x-layout title="Editar Série - '{!! $series->name !!}'">
    <x-series.form :action="route('series.update', $series->id)" :method="'PUT'" :series="$series"></x-series.form>
</x-layout>