<?php
if (!function_exists('_5ad1203db9baa3416d46a2b5f454acdc')):
function _5ad1203db9baa3416d46a2b5f454acdc($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
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
    'name',
    'descriptionTrailing',
    'description',
    'label',
    'badge',
]));
?>

<?php $descriptionTrailing = $descriptionTrailing ??= $attributes->pluck('description:trailing'); ?>

<?php
$__defaults = [
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'descriptionTrailing' => null,
    'description' => null,
    'label' => null,
    'badge' => null,
];
$name ??= $attributes['name'] ?? $__defaults['name']; unset($attributes['name']);
$descriptionTrailing ??= $attributes['description-trailing'] ?? $attributes['descriptionTrailing'] ?? $__defaults['descriptionTrailing']; unset($attributes['descriptionTrailing'], $attributes['description-trailing']);
$description ??= $attributes['description'] ?? $__defaults['description']; unset($attributes['description']);
$label ??= $attributes['label'] ?? $__defaults['label']; unset($attributes['label']);
$badge ??= $attributes['badge'] ?? $__defaults['badge']; unset($attributes['badge']);
unset($__defaults);
?>

<?php if (isset($label) || isset($description) || isset($descriptionTrailing)): ?>
    <?php

        $fieldAttributes = Flux::attributesAfter('field:', $attributes, []);
        $labelAttributes = Flux::attributesAfter('label:', $attributes, ['badge' => $badge]);
        $descriptionAttributes = Flux::attributesAfter('description:', $attributes, []);
        $errorAttributes = Flux::attributesAfter('error:', $attributes, ['name' => $name]);
    ?>
    <?php if (!function_exists('_aba92bdf24bccdfccbdefa84f17fd3ec')) { $__blaze->compile('C:\CooperativeTraining\vendor\livewire\flux\src/../stubs/resources/views/flux/field.blade.php', $__blaze->compiledPath.'/aba92bdf24bccdfccbdefa84f17fd3ec.php'); require $__blaze->compiledPath.'/aba92bdf24bccdfccbdefa84f17fd3ec.php'; } ?>
<?php if (isset($__slotsaba92bdf24bccdfccbdefa84f17fd3ec)) { $__slotsStackaba92bdf24bccdfccbdefa84f17fd3ec[] = $__slotsaba92bdf24bccdfccbdefa84f17fd3ec; } ?>
<?php if (isset($__attrsaba92bdf24bccdfccbdefa84f17fd3ec)) { $__attrsStackaba92bdf24bccdfccbdefa84f17fd3ec[] = $__attrsaba92bdf24bccdfccbdefa84f17fd3ec; } ?>
<?php $__attrsaba92bdf24bccdfccbdefa84f17fd3ec = ['attributes' => $fieldAttributes]; ?>
<?php $__slotsaba92bdf24bccdfccbdefa84f17fd3ec = []; ?>
<?php $__blaze->pushData($__attrsaba92bdf24bccdfccbdefa84f17fd3ec); ?>
<?php ob_start(); ?>
        <?php if (isset($label)): ?>
            <?php if (!function_exists('_c90d6687d758ef94cd9c1b72d3cec818')) { $__blaze->compile('C:\CooperativeTraining\vendor\livewire\flux\src/../stubs/resources/views/flux/label.blade.php', $__blaze->compiledPath.'/c90d6687d758ef94cd9c1b72d3cec818.php'); require $__blaze->compiledPath.'/c90d6687d758ef94cd9c1b72d3cec818.php'; } ?>
<?php if (isset($__slotsc90d6687d758ef94cd9c1b72d3cec818)) { $__slotsStackc90d6687d758ef94cd9c1b72d3cec818[] = $__slotsc90d6687d758ef94cd9c1b72d3cec818; } ?>
<?php if (isset($__attrsc90d6687d758ef94cd9c1b72d3cec818)) { $__attrsStackc90d6687d758ef94cd9c1b72d3cec818[] = $__attrsc90d6687d758ef94cd9c1b72d3cec818; } ?>
<?php $__attrsc90d6687d758ef94cd9c1b72d3cec818 = ['attributes' => $labelAttributes]; ?>
<?php $__slotsc90d6687d758ef94cd9c1b72d3cec818 = []; ?>
<?php $__blaze->pushData($__attrsc90d6687d758ef94cd9c1b72d3cec818); ?>
<?php ob_start(); ?><?php echo e($label); ?><?php $__slotsc90d6687d758ef94cd9c1b72d3cec818['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slotsc90d6687d758ef94cd9c1b72d3cec818); ?>
<?php _c90d6687d758ef94cd9c1b72d3cec818($__blaze, $__attrsc90d6687d758ef94cd9c1b72d3cec818, $__slotsc90d6687d758ef94cd9c1b72d3cec818, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStackc90d6687d758ef94cd9c1b72d3cec818)) { $__slotsc90d6687d758ef94cd9c1b72d3cec818 = array_pop($__slotsStackc90d6687d758ef94cd9c1b72d3cec818); } ?>
<?php if (! empty($__attrsStackc90d6687d758ef94cd9c1b72d3cec818)) { $__attrsc90d6687d758ef94cd9c1b72d3cec818 = array_pop($__attrsStackc90d6687d758ef94cd9c1b72d3cec818); } ?>
<?php $__blaze->popData(); ?>
        <?php endif; ?>

        <?php if (isset($description)): ?>
            <?php if (!function_exists('_45b01875d901dc254f3b0a86977cbe90')) { $__blaze->compile('C:\CooperativeTraining\vendor\livewire\flux\src/../stubs/resources/views/flux/description.blade.php', $__blaze->compiledPath.'/45b01875d901dc254f3b0a86977cbe90.php'); require $__blaze->compiledPath.'/45b01875d901dc254f3b0a86977cbe90.php'; } ?>
<?php if (isset($__slots45b01875d901dc254f3b0a86977cbe90)) { $__slotsStack45b01875d901dc254f3b0a86977cbe90[] = $__slots45b01875d901dc254f3b0a86977cbe90; } ?>
<?php if (isset($__attrs45b01875d901dc254f3b0a86977cbe90)) { $__attrsStack45b01875d901dc254f3b0a86977cbe90[] = $__attrs45b01875d901dc254f3b0a86977cbe90; } ?>
<?php $__attrs45b01875d901dc254f3b0a86977cbe90 = ['attributes' => $descriptionAttributes]; ?>
<?php $__slots45b01875d901dc254f3b0a86977cbe90 = []; ?>
<?php $__blaze->pushData($__attrs45b01875d901dc254f3b0a86977cbe90); ?>
<?php ob_start(); ?><?php echo e($description); ?><?php $__slots45b01875d901dc254f3b0a86977cbe90['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots45b01875d901dc254f3b0a86977cbe90); ?>
<?php _45b01875d901dc254f3b0a86977cbe90($__blaze, $__attrs45b01875d901dc254f3b0a86977cbe90, $__slots45b01875d901dc254f3b0a86977cbe90, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack45b01875d901dc254f3b0a86977cbe90)) { $__slots45b01875d901dc254f3b0a86977cbe90 = array_pop($__slotsStack45b01875d901dc254f3b0a86977cbe90); } ?>
<?php if (! empty($__attrsStack45b01875d901dc254f3b0a86977cbe90)) { $__attrs45b01875d901dc254f3b0a86977cbe90 = array_pop($__attrsStack45b01875d901dc254f3b0a86977cbe90); } ?>
<?php $__blaze->popData(); ?>
        <?php endif; ?>

        <?php echo e($slot); ?>


        
        <?php $__getScope = fn($scope = []) => $scope; ?><?php if (isset($scope)) $__scope = $scope; ?><?php $scope = $__getScope(scope: ['attributes' => $errorAttributes->getAttributes()]); ?>
        <?php if (!function_exists('_cfe65fcb344ed585412a15a1937c6122')) { $__blaze->compile('C:\CooperativeTraining\vendor\livewire\flux\src/../stubs/resources/views/flux/error.blade.php', $__blaze->compiledPath.'/cfe65fcb344ed585412a15a1937c6122.php'); require $__blaze->compiledPath.'/cfe65fcb344ed585412a15a1937c6122.php'; } ?>
<?php $__blaze->pushData(['attributes' => new \Illuminate\View\ComponentAttributeBag($scope['attributes'])]); ?>
<?php _cfe65fcb344ed585412a15a1937c6122($__blaze, ['attributes' => new \Illuminate\View\ComponentAttributeBag($scope['attributes'])], [], ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
        <?php if (isset($__scope)) { $scope = $__scope; unset($__scope); } ?>

        <?php if (isset($descriptionTrailing)): ?>
            <?php if (!function_exists('_45b01875d901dc254f3b0a86977cbe90')) { $__blaze->compile('C:\CooperativeTraining\vendor\livewire\flux\src/../stubs/resources/views/flux/description.blade.php', $__blaze->compiledPath.'/45b01875d901dc254f3b0a86977cbe90.php'); require $__blaze->compiledPath.'/45b01875d901dc254f3b0a86977cbe90.php'; } ?>
<?php if (isset($__slots45b01875d901dc254f3b0a86977cbe90)) { $__slotsStack45b01875d901dc254f3b0a86977cbe90[] = $__slots45b01875d901dc254f3b0a86977cbe90; } ?>
<?php if (isset($__attrs45b01875d901dc254f3b0a86977cbe90)) { $__attrsStack45b01875d901dc254f3b0a86977cbe90[] = $__attrs45b01875d901dc254f3b0a86977cbe90; } ?>
<?php $__attrs45b01875d901dc254f3b0a86977cbe90 = ['attributes' => $descriptionAttributes]; ?>
<?php $__slots45b01875d901dc254f3b0a86977cbe90 = []; ?>
<?php $__blaze->pushData($__attrs45b01875d901dc254f3b0a86977cbe90); ?>
<?php ob_start(); ?><?php echo e($descriptionTrailing); ?><?php $__slots45b01875d901dc254f3b0a86977cbe90['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots45b01875d901dc254f3b0a86977cbe90); ?>
<?php _45b01875d901dc254f3b0a86977cbe90($__blaze, $__attrs45b01875d901dc254f3b0a86977cbe90, $__slots45b01875d901dc254f3b0a86977cbe90, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack45b01875d901dc254f3b0a86977cbe90)) { $__slots45b01875d901dc254f3b0a86977cbe90 = array_pop($__slotsStack45b01875d901dc254f3b0a86977cbe90); } ?>
<?php if (! empty($__attrsStack45b01875d901dc254f3b0a86977cbe90)) { $__attrs45b01875d901dc254f3b0a86977cbe90 = array_pop($__attrsStack45b01875d901dc254f3b0a86977cbe90); } ?>
<?php $__blaze->popData(); ?>
        <?php endif; ?>
    <?php $__slotsaba92bdf24bccdfccbdefa84f17fd3ec['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slotsaba92bdf24bccdfccbdefa84f17fd3ec); ?>
<?php _aba92bdf24bccdfccbdefa84f17fd3ec($__blaze, $__attrsaba92bdf24bccdfccbdefa84f17fd3ec, $__slotsaba92bdf24bccdfccbdefa84f17fd3ec, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStackaba92bdf24bccdfccbdefa84f17fd3ec)) { $__slotsaba92bdf24bccdfccbdefa84f17fd3ec = array_pop($__slotsStackaba92bdf24bccdfccbdefa84f17fd3ec); } ?>
<?php if (! empty($__attrsStackaba92bdf24bccdfccbdefa84f17fd3ec)) { $__attrsaba92bdf24bccdfccbdefa84f17fd3ec = array_pop($__attrsStackaba92bdf24bccdfccbdefa84f17fd3ec); } ?>
<?php $__blaze->popData(); ?>
<?php else: ?>
    <?php echo e($slot); ?>

<?php endif; ?>
<?php
echo ltrim(ob_get_clean());
} endif; ?><?php /**PATH C:\CooperativeTraining\vendor\livewire\flux\src/../stubs/resources/views/flux/with-field.blade.php ENDPATH**/ ?>