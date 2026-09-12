<?php
if (!function_exists('_139785a162d13ac286aa51db9c33a387')):
function _139785a162d13ac286aa51db9c33a387($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
$__env = $__blaze->env;

if (($__data['attributes'] ?? null) instanceof \Illuminate\View\ComponentAttributeBag) { $__data = $__data + $__data['attributes']->all(); unset($__data['attributes']); }
extract($__slots, EXTR_SKIP); unset($__slots);
extract($__data, EXTR_SKIP);
$attributes = \Livewire\Blaze\Runtime\BlazeAttributeBag::make($__data, $__bound, $__keys);
unset($__data, $__bound, $__keys);
ob_start();
?>


<?php
$__defaults = [
    'iconVariant' => 'mini',
    'size' => null,
];
$iconVariant ??= $attributes['icon-variant'] ?? $attributes['iconVariant'] ?? $__defaults['iconVariant']; unset($attributes['iconVariant'], $attributes['icon-variant']);
$size ??= $attributes['size'] ?? $__defaults['size']; unset($attributes['size']);
unset($__defaults);
?>

<?php
$attributes = $attributes->merge([
    'variant' => 'subtle',
    'class' => '-me-1',
    'square' => true,
    'size' => null,
]);
?>

<?php if (!function_exists('_2260da6fdccfc29facefd68bda5a151e')) { $__blaze->compile('C:\CooperativeTraining\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php', $__blaze->compiledPath.'/2260da6fdccfc29facefd68bda5a151e.php'); require $__blaze->compiledPath.'/2260da6fdccfc29facefd68bda5a151e.php'; } ?>
<?php if (isset($__slots2260da6fdccfc29facefd68bda5a151e)) { $__slotsStack2260da6fdccfc29facefd68bda5a151e[] = $__slots2260da6fdccfc29facefd68bda5a151e; } ?>
<?php if (isset($__attrs2260da6fdccfc29facefd68bda5a151e)) { $__attrsStack2260da6fdccfc29facefd68bda5a151e[] = $__attrs2260da6fdccfc29facefd68bda5a151e; } ?>
<?php $__attrs2260da6fdccfc29facefd68bda5a151e = ['attributes' => $attributes,'size' => $size === 'sm' || $size === 'xs' ? 'xs' : 'sm','xData' => 'fluxInputViewable','xOn:click' => 'toggle()','xBind:dataViewableOpen' => 'open','ariaLabel' => e(__('Toggle password visibility'))]; ?>
<?php $__slots2260da6fdccfc29facefd68bda5a151e = []; ?>
<?php $__blaze->pushData($__attrs2260da6fdccfc29facefd68bda5a151e); ?>
<?php ob_start(); ?>
    <?php if (!function_exists('_e6f6e77850e7d88062725a5c4479e097')) { $__blaze->compile('C:\CooperativeTraining\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/eye-slash.blade.php', $__blaze->compiledPath.'/e6f6e77850e7d88062725a5c4479e097.php'); require $__blaze->compiledPath.'/e6f6e77850e7d88062725a5c4479e097.php'; } ?>
<?php $__blaze->pushData(['variant' => $iconVariant,'class' => 'hidden [[data-viewable-open]>&]:block']); ?>
<?php _e6f6e77850e7d88062725a5c4479e097($__blaze, ['variant' => $iconVariant,'class' => 'hidden [[data-viewable-open]>&]:block'], [], ['variant'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
    <?php if (!function_exists('_a5a5c6079375462bdf0fe201d4ca641b')) { $__blaze->compile('C:\CooperativeTraining\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/eye.blade.php', $__blaze->compiledPath.'/a5a5c6079375462bdf0fe201d4ca641b.php'); require $__blaze->compiledPath.'/a5a5c6079375462bdf0fe201d4ca641b.php'; } ?>
<?php $__blaze->pushData(['variant' => $iconVariant,'class' => 'block [[data-viewable-open]>&]:hidden']); ?>
<?php _a5a5c6079375462bdf0fe201d4ca641b($__blaze, ['variant' => $iconVariant,'class' => 'block [[data-viewable-open]>&]:hidden'], [], ['variant'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
<?php $__slots2260da6fdccfc29facefd68bda5a151e['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots2260da6fdccfc29facefd68bda5a151e); ?>
<?php _2260da6fdccfc29facefd68bda5a151e($__blaze, $__attrs2260da6fdccfc29facefd68bda5a151e, $__slots2260da6fdccfc29facefd68bda5a151e, ['attributes', 'size'], ['xData' => 'x-data', 'xOn:click' => 'x-on:click', 'xBind:dataViewableOpen' => 'x-bind:data-viewable-open', 'ariaLabel' => 'aria-label'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack2260da6fdccfc29facefd68bda5a151e)) { $__slots2260da6fdccfc29facefd68bda5a151e = array_pop($__slotsStack2260da6fdccfc29facefd68bda5a151e); } ?>
<?php if (! empty($__attrsStack2260da6fdccfc29facefd68bda5a151e)) { $__attrs2260da6fdccfc29facefd68bda5a151e = array_pop($__attrsStack2260da6fdccfc29facefd68bda5a151e); } ?>
<?php $__blaze->popData(); ?>
<?php
echo ltrim(ob_get_clean());
} endif; ?><?php /**PATH C:\CooperativeTraining\vendor\livewire\flux\src/../stubs/resources/views/flux/input/viewable.blade.php ENDPATH**/ ?>