<?php

namespace Spatie\ViewComponents;

final class CompileStartRenderDirective
{
    public function __invoke(string $expression): string
    {
        $expressionParts = explode(',', $expression, 2);

        $componentPath = $expressionParts[0];
        $props = trim($expressionParts[1] ?? '[]');

        return "<?php app(Spatie\ViewComponents\ComponentFactory::class)->startComponent(app(Spatie\ViewComponents\ComponentFinder::class)->find({$componentPath}), {$props}); ?>";
    }
}
