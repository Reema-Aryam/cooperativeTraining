<?php
if (!function_exists('_e5760bd21bc237d0162d31058d065876')):
function _e5760bd21bc237d0162d31058d065876($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
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
    'name' => null,
];
$name ??= $attributes['name'] ?? $__defaults['name']; unset($attributes['name']);
unset($__defaults);
?>

<?php
// We only want to show the name attribute on the checkbox if it has been set
// manually, but not if it has been set from the wire:model attribute...
$showName = isset($name);

if (! isset($name)) {
    $name = $attributes->whereStartsWith('wire:model')->first();
}

$classes = Flux::classes()
    ->add('flex size-[1.125rem] rounded-[.3rem] mt-px outline-offset-2')
    ;
?>

<?php if (!function_exists('_c9e38b2167fb1af42bf2c1fd977c45c8')) { $__blaze->compile('C:\CooperativeTraining\vendor\livewire\flux\src/../stubs/resources/views/flux/with-inline-field.blade.php', $__blaze->compiledPath.'/c9e38b2167fb1af42bf2c1fd977c45c8.php'); require $__blaze->compiledPath.'/c9e38b2167fb1af42bf2c1fd977c45c8.php'; } ?>
<?php if (isset($__slotsc9e38b2167fb1af42bf2c1fd977c45c8)) { $__slotsStackc9e38b2167fb1af42bf2c1fd977c45c8[] = $__slotsc9e38b2167fb1af42bf2c1fd977c45c8; } ?>
<?php if (isset($__attrsc9e38b2167fb1af42bf2c1fd977c45c8)) { $__attrsStackc9e38b2167fb1af42bf2c1fd977c45c8[] = $__attrsc9e38b2167fb1af42bf2c1fd977c45c8; } ?>
<?php $__attrsc9e38b2167fb1af42bf2c1fd977c45c8 = ['attributes' => $attributes]; ?>
<?php $__slotsc9e38b2167fb1af42bf2c1fd977c45c8 = []; ?>
<?php $__blaze->pushData($__attrsc9e38b2167fb1af42bf2c1fd977c45c8); ?>
<?php ob_start(); ?>
    <ui-checkbox <?php echo e($attributes->class($classes)); ?> <?php if($showName): ?> name="<?php echo e($name); ?>" <?php endif; ?> data-flux-control data-flux-checkbox>
        <?php $blaze_memoized_key = \Livewire\Blaze\Memoizer\Memo::key("flux::checkbox.indicator", []); ?><?php if ($blaze_memoized_key !== null && \Livewire\Blaze\Memoizer\Memo::has($blaze_memoized_key)) : ?><?php echo \Livewire\Blaze\Memoizer\Memo::get($blaze_memoized_key); ?><?php else : ?><?php ob_start(); ?><?php if (!function_exists('_88fbca2d76e7616fdd8052f916b0eb6a')) { $__blaze->compile('C:\CooperativeTraining\vendor\livewire\flux\src/../stubs/resources/views/flux/checkbox/indicator.blade.php', $__blaze->compiledPath.'/88fbca2d76e7616fdd8052f916b0eb6a.php'); require $__blaze->compiledPath.'/88fbca2d76e7616fdd8052f916b0eb6a.php'; } ?>
<?php $__blaze->pushData([]); ?>
<?php _88fbca2d76e7616fdd8052f916b0eb6a($__blaze, [], [], [], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?><?php $blaze_memoized_html = ob_get_clean(); ?><?php if ($blaze_memoized_key !== null) { \Livewire\Blaze\Memoizer\Memo::put($blaze_memoized_key, $blaze_memoized_html); } ?><?php echo $blaze_memoized_html; ?><?php endif; ?>
    </ui-checkbox>
<?php $__slotsc9e38b2167fb1af42bf2c1fd977c45c8['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slotsc9e38b2167fb1af42bf2c1fd977c45c8); ?>
<?php _c9e38b2167fb1af42bf2c1fd977c45c8($__blaze, $__attrsc9e38b2167fb1af42bf2c1fd977c45c8, $__slotsc9e38b2167fb1af42bf2c1fd977c45c8, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStackc9e38b2167fb1af42bf2c1fd977c45c8)) { $__slotsc9e38b2167fb1af42bf2c1fd977c45c8 = array_pop($__slotsStackc9e38b2167fb1af42bf2c1fd977c45c8); } ?>
<?php if (! empty($__attrsStackc9e38b2167fb1af42bf2c1fd977c45c8)) { $__attrsc9e38b2167fb1af42bf2c1fd977c45c8 = array_pop($__attrsStackc9e38b2167fb1af42bf2c1fd977c45c8); } ?>
<?php $__blaze->popData(); ?>
<?php
echo ltrim(ob_get_clean());
} endif; ?><?php /**PATH C:\CooperativeTraining\vendor\livewire\flux\src/../stubs/resources/views/flux/checkbox/variants/default.blade.php ENDPATH**/ ?>