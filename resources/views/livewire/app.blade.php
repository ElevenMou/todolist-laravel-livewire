<div class="container">

    <div class="heading">
        <h2 id="title">My list</h2>

        @livewire('add-item-form')

        @livewire('list-items')
    </div>

    @if ($session)
        @if (session()->has('success'))
            <div class="alert success">
                <button wire:click="closeSession">X</button>
                <p>{{ session()->get('success') }}</p>
            </div>
        @endif
    @endif

    @if ($session)
        @if (session()->has('deleted'))
            <div class="alert danger">
                <button wire:click="closeSession">X</button>
                <p>{{ session()->get('deleted') }}</p>
            </div>
        @endif
    @endif

</div>
