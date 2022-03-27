<div class="container">

    <div class="heading">
        <h2 id="title">My list</h2>

        @livewire('add-item-form')

        @livewire('list-items')
    </div>

    @if (session()->has('success'))
        <p class="alert success">{{ session()->get('success') }}</p>
    @endif
    @if (session()->has('deleted'))
        <p class="alert danger">{{ session()->get('deleted') }}</p>
    @endif

</div>
