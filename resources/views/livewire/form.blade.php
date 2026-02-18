<div>
    <form wire:submit="save">
        <input type="text" wire:model="postTitle" class="border">
        
        <button type="button" @click="$wire.postTitle = ''">Clear</button>
        
        <button type="submit">Submit</button>
        <hr>
    </form>
</div>
