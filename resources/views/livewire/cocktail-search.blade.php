<div>
    <input 
        type="text" 
        wire:keydown.enter="search" 
        wire:model="query"/>
    <span>
    @foreach($cocktails as $cocktail)
    <div>
        {{ $cocktail->name }}
    </div>
    @endforeach
    </span>
</div>