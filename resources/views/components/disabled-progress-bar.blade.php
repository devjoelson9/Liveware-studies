<script>
    document.addEventListener('livewire:navigated', () => {
            if (window.Livewire?.navigate?.disableProgressBar) {
                window.Livewire.navigate.disableProgressBar()
            }
        })
</script>
