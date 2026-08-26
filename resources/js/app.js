import './bootstrap'
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm'

// Register Alpine plugins here if needed in the future:
// import Collapse from '@alpinejs/collapse'
// Alpine.plugin(Collapse)

window.Alpine = Alpine

Livewire.start()
