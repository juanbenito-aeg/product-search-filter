<div>
    <form wire:submit="save" x-data="{ isParaVisible: false }">
        <input type="text" wire:model="postTitle" class="border">
        <button type="button" @click="$wire.postTitle = ''">Clear</button>
        <button type="submit">Submit</button>
        <hr>
        <button type="button" @click="isParaVisible = !isParaVisible">Make para visible</button>
        <p x-effect="console.log(isParaVisible)">Hey</p>
    </form>
</div>
