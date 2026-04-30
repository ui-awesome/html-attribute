<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents HTML attribute names.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Attribute: string
{
    /**
     * `accept` — List of types the server accepts, typically a file type.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/accept
     */
    case ACCEPT = 'accept';

    /**
     * `autocomplete` — Indicates whether controls can have their values automatically completed.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/autocomplete
     */
    case AUTOCOMPLETE = 'autocomplete';

    /**
     * `capture` — Media capture hint for file inputs.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/capture
     */
    case CAPTURE = 'capture';

    /**
     * `checked` — Indicates whether the command or control is checked.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/checked
     */
    case CHECKED = 'checked';

    /**
     * `content` — A value associated with a meta element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/content
     */
    case CONTENT = 'content';

    /**
     * `crossorigin` — How the element handles cross-origin requests.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/crossorigin
     */
    case CROSSORIGIN = 'crossorigin';

    /**
     * `dirname` — Enables the submission of the directionality of the element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/dirname
     */
    case DIRNAME = 'dirname';

    /**
     * `disabled` — Indicates whether the user can interact with the element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/disabled
     */
    case DISABLED = 'disabled';

    /**
     * `elementtiming` — Marks the element for observation by the `PerformanceElementTiming` API.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/elementtiming
     */
    case ELEMENTTIMING = 'elementtiming';

    /**
     * `fetchpriority` — Hints at the relative priority for fetching a resource.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/fetchpriority
     */
    case FETCHPRIORITY = 'fetchpriority';

    /**
     * `for` — Describes elements which belong to this one.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/for
     */
    case FOR = 'for';

    /**
     * `form` — Indicates the form that is the owner of the element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/form
     */
    case FORM = 'form';

    /**
     * `integrity` — Contains inline metadata that a user agent can use to verify that a fetched resource has been
     * delivered without unexpected manipulation (Subresource Integrity).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/integrity
     */
    case INTEGRITY = 'integrity';

    /**
     * `max` — Indicates the maximum value allowed.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/max
     */
    case MAX = 'max';

    /**
     * `maxlength` — Defines the maximum number of characters allowed in the element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/maxlength
     */
    case MAXLENGTH = 'maxlength';

    /**
     * `media` — Specifies the media that the linked resource applies to.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/media
     */
    case MEDIA = 'media';

    /**
     * `min` — Indicates the minimum value allowed.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/min
     */
    case MIN = 'min';

    /**
     * `minlength` — Defines the minimum number of characters allowed in the element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/minlength
     */
    case MINLENGTH = 'minlength';

    /**
     * `multiple` — Indicates whether multiple values can be entered in an input of the type email or file.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/multiple
     */
    case MULTIPLE = 'multiple';

    /**
     * `pattern` — Defines a regular expression which the element's value will be validated against.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/pattern
     */
    case PATTERN = 'pattern';

    /**
     * `placeholder` — Provides a hint to the user of what can be entered in the field.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/placeholder
     */
    case PLACEHOLDER = 'placeholder';

    /**
     * `readonly` — Indicates whether the element can be edited.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/readonly
     */
    case READONLY = 'readonly';

    /**
     * `referrerpolicy` — Specifies which referrer to use when fetching the resource.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/referrerpolicy
     */
    case REFERRERPOLICY = 'referrerpolicy';

    /**
     * `rel` — Specifies the relationship of the target object to the link object.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel
     */
    case REL = 'rel';

    /**
     * `required` — Indicates whether this element is required to fill out or not.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/required
     */
    case REQUIRED = 'required';

    /**
     * `size` — Defines the width of the element (in pixels).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/size
     */
    case SIZE = 'size';

    /**
     * `src` — Specifies the URL of the resource.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/src
     */
    case SRC = 'src';

    /**
     * `step` — Defines the granularity of the value in an input of type number or range.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/step
     */
    case STEP = 'step';

    /**
     * `target` — Specifies the browsing context for hyperlink navigation or form submission.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/target
     */
    case TARGET = 'target';

    /**
     * `type` — Defines the type of the element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/type
     */
    case TYPE = 'type';
}
