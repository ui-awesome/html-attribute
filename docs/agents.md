# AI assistance

The canonical package skill is [ui-awesome-html-attribute](../skills/ui-awesome-html-attribute/SKILL.md). It covers typed HTML attribute traits and values. The checkout's
`.agents/skills/` and `.claude/skills/` links point to that single source; no client-specific copies are maintained.

## Install in an application

Use the [one-time Composer setup](https://github.com/yii2-framework/docs/blob/main/src/content/docs/project/ai-agents.md#composer-installation)
for `llm/skills`, explicitly trust `ui-awesome/html-attribute`, and configure auto-sync before expecting dependency updates to
synchronize skills. Composer metadata alone does not install a synchronizer or activate a skill. Inspect the installed
plugin version, permitted donor and synchronization result.

```bash
composer install
composer skills:show
```

With manual synchronization configured, run `composer skills:update`. These commands assume the application setup is
already authorized and complete. Installing a package under `vendor/` alone does not expose a skill at the application root.

### Optional npx installation

For optional project-scoped installation, list the local source first:

```bash
npx skills@1.7.2 add /absolute/path/to/html-attribute --list
npx skills@1.7.2 add /absolute/path/to/html-attribute --skill ui-awesome-html-attribute --agent claude-code codex opencode
```

Use an installed `vendor/ui-awesome/html-attribute` source only if that release contains this skill. A copied skill must be
refreshed on upgrades. Local changes do not prove availability from a published GitHub or Composer release.

## Discovery and activation

Open a fresh session at the project root. Codex uses `.agents/skills/ui-awesome-html-attribute/` and explicit `$ui-awesome-html-attribute`;
Claude Code uses `.claude/skills/ui-awesome-html-attribute/` and `/ui-awesome-html-attribute`. OpenCode can load the named skill through its native skill tool.
Verify the installed client's actual discovery paths and avoid duplicate/global same-name fallbacks. Installer `--list`
checks source discovery, not native activation. Capture a real load event and execute the task before calling it tested.

## Example prompts

Explicit Codex invocation (adapt the first line to the other client's native mechanism):

```text
$ui-awesome-html-attribute
Compose HasAttributes with HasClass, HasId and HasData in a small class. Test class merging versus override, a data attribute and immutable updates.
Use the installed source, show executable checks, and do not install dependencies or alter unrelated code.
```

Natural selection, without naming the skill:

```text
Which ui-awesome/html-attribute traits let me build reusable typed attributes without inventing an HTML rendering API?
Include a runnable normal case, a boundary case and a deliberate invalid-input or unsupported-capability case.
```

For an executable starting point, save the following as `attribute-example.php` in an application root with this package
installed, then run `php attribute-example.php`:

```php
<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use UIAwesome\Html\Attribute\Global\{HasAria, HasClass, HasData, HasEvents};
use UIAwesome\Html\Attribute\HasRel;
use UIAwesome\Html\Mixin\HasAttributes;

final class AttributeExample
{
    use HasAttributes;
    use HasAria;
    use HasClass;
    use HasData;
    use HasEvents;
    use HasRel;
}

function check(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

$original = new AttributeExample();
$updated = $original->class('first')->class('second')->dataAttributes(['a' => '1'])
    ->dataAttributes(['b' => '2'])->ariaAttributes(['label' => 'Open'])->ariaAttributes(['hidden' => 'false'])
    ->events(['click' => 'open()'])->events(['focus' => 'focus()']);
$attributes = $updated->getAttributes();
check($original->getAttributes() === [], 'The original must remain unchanged.');
check($attributes['class'] === 'first second', 'Classes must merge.');
check($attributes['data-a'] === '1' && $attributes['data-b'] === '2', 'Data keys must be preserved.');
check($attributes['aria-label'] === 'Open' && $attributes['aria-hidden'] === 'false', 'ARIA keys must be preserved.');
check($attributes['onclick'] === 'open()' && $attributes['onfocus'] === 'focus()', 'Event keys must be preserved.');
check($updated->dataAttributes([]) === $updated, 'An empty data batch is a no-op.');
check($updated->ariaAttributes([]) === $updated, 'An empty ARIA batch is a no-op.');
check($updated->events([]) === $updated, 'An empty event batch is a no-op.');
check($updated->class('replacement', true)->getAttributes()['class'] === 'replacement', 'Override must replace classes.');
check(!array_key_exists('data-a', $updated->addDataAttribute('a', null)->getAttributes()), 'Null must remove the key.');

try {
    $updated->rel('not-a-rel-value');
    throw new RuntimeException('An invalid rel value must be rejected.');
} catch (InvalidArgumentException) {
    echo "Attribute checks passed.\n";
}
```

Expected verification: inspect the referenced source contracts, execute the generated PHP with independent assertions,
and record exact output or exceptions. Check state isolation and encoding where applicable. A correct answer without a
native load trace is not evidence of native activation. In a separate unrelated task, ensure this skill is not forced
into scope; do not change the real checkout to run a negative control.

## Verification limits

Run this package's configured checks and the consuming application's relevant integration tests. Mark PHP versions,
client activation, browser behavior and published artifacts separately when not exercised. Keep raw model evaluations,
fixtures and provider traces in ignored maintainer storage, not the distributable skill. The examples above are prompts,
not a claim that a particular provider has executed them.

[Back to documentation](../README.md#documentation)
