<?php
if (!function_exists('__9f3a35c06cbf7015de8e3e451d3dbe4c')):
function __9f3a35c06cbf7015de8e3e451d3dbe4c($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
$__env = $__blaze->env;
$__slots['slot'] ??= new \Illuminate\View\ComponentSlot('');
if (($__data['attributes'] ?? null) instanceof \Illuminate\View\ComponentAttributeBag) { $__data = $__data + $__data['attributes']->all(); unset($__data['attributes']); }
extract($__slots, EXTR_SKIP); unset($__slots);
extract($__data, EXTR_SKIP);
$attributes = \Livewire\Blaze\Runtime\BlazeAttributeBag::make($__data, $__bound, $__keys);
unset($__data, $__bound, $__keys);
ob_start();
?>


<?php
extract(Flux::forwardedAttributes($attributes, [
    'tooltipPosition',
    'tooltipKbd',
    'tooltip',
]));
?>

<?php $tooltipPosition = $tooltipPosition ??= $attributes->pluck('tooltip:position'); ?>
<?php $tooltipKbd = $tooltipKbd ??= $attributes->pluck('tooltip:kbd'); ?>
<?php $tooltip = $tooltip ??= $attributes->pluck('tooltip'); ?>

<?php
$__defaults = [
    'tooltipPosition' => 'top',
    'tooltipKbd' => null,
    'tooltip' => null,
];
$tooltipPosition ??= $attributes['tooltip-position'] ?? $attributes['tooltipPosition'] ?? $__defaults['tooltipPosition']; unset($attributes['tooltipPosition'], $attributes['tooltip-position']);
$tooltipKbd ??= $attributes['tooltip-kbd'] ?? $attributes['tooltipKbd'] ?? $__defaults['tooltipKbd']; unset($attributes['tooltipKbd'], $attributes['tooltip-kbd']);
$tooltip ??= $attributes['tooltip'] ?? $__defaults['tooltip']; unset($attributes['tooltip']);
unset($__defaults);
?>

<?php if ($tooltip): ?>
    <?php if (!function_exists('__3bb50bb6223522f369859d45107de6ee')) { $__blaze->compile('C:\CooperativeTraining\vendor\livewire\flux\src/../stubs/resources/views/flux/tooltip/index.blade.php', $__blaze->compiledPath.'/3bb50bb6223522f369859d45107de6ee.php'); require $__blaze->compiledPath.'/3bb50bb6223522f369859d45107de6ee.php'; } ?>
<?php if (isset($__slots3bb50bb6223522f369859d45107de6ee)) { $__slotsStack3bb50bb6223522f369859d45107de6ee[] = $__slots3bb50bb6223522f369859d45107de6ee; } ?>
<?php if (isset($__attrs3bb50bb6223522f369859d45107de6ee)) { $__attrsStack3bb50bb6223522f369859d45107de6ee[] = $__attrs3bb50bb6223522f369859d45107de6ee; } ?>
<?php $__attrs3bb50bb6223522f369859d45107de6ee = ['class' => 'inline-flex','content' => $tooltip,'position' => $tooltipPosition,'kbd' => $tooltipKbd]; ?>
<?php $__slots3bb50bb6223522f369859d45107de6ee = []; ?>
<?php $__blaze->pushData($__attrs3bb50bb6223522f369859d45107de6ee); ?>
<?php ob_start(); ?>
        <?php echo e($slot); ?>

    <?php $__slots3bb50bb6223522f369859d45107de6ee['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slots3bb50bb6223522f369859d45107de6ee); ?>
<?php __3bb50bb6223522f369859d45107de6ee($__blaze, $__attrs3bb50bb6223522f369859d45107de6ee, $__slots3bb50bb6223522f369859d45107de6ee, ['content', 'position', 'kbd'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack3bb50bb6223522f369859d45107de6ee)) { $__slots3bb50bb6223522f369859d45107de6ee = array_pop($__slotsStack3bb50bb6223522f369859d45107de6ee); } ?>
<?php if (! empty($__attrsStack3bb50bb6223522f369859d45107de6ee)) { $__attrs3bb50bb6223522f369859d45107de6ee = array_pop($__attrsStack3bb50bb6223522f369859d45107de6ee); } ?>
<?php $__blaze->popData(); ?>
<?php else: ?>
    <?php echo e($slot); ?>

<?php endif; ?>
<?php
echo $__blaze->processPassthroughContent('ltrim', ltrim(ob_get_clean()));
} endif; ?><?php /**PATH C:\CooperativeTraining\vendor\livewire\flux\src/../stubs/resources/views/flux/with-tooltip.blade.php ENDPATH**/ ?>