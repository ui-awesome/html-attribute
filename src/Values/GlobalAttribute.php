<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents HTML global attribute names.
 *
 * Defines a curated set of global attribute identifiers as enum cases. The enum values match the attribute names as
 * used in HTML source.
 *
 * Key features.
 * - Designed for use in tags, components, and helpers requiring global attribute assignment.
 * - Enum values map to attribute names as `string` tokens.
 * - Integration-ready for tag rendering and element generation APIs.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum GlobalAttribute: string
{
    /**
     * `accesskey` — Keyboard shortcut to activate or add focus to the element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/accesskey
     */
    case ACCESSKEY = 'accesskey';

    /**
     * `anchor` — Associates a positioned element with an anchor element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/anchor
     */
    case ANCHOR = 'anchor';

    /**
     * `autocapitalize` — Controls whether and how text input is automatically capitalized.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/autocapitalize
     */
    case AUTOCAPITALIZE = 'autocapitalize';

    /**
     * `autocorrect` — Controls whether autocorrection is enabled for editable text.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/autocorrect
     */
    case AUTOCORRECT = 'autocorrect';

    /**
     * `autofocus` — Indicates that the element should be focused on page load.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/autofocus
     */
    case AUTOFOCUS = 'autofocus';

    /**
     * `class` — Space-separated list of class names for the element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/class
     */
    case CLASS_CSS = 'class';

    /**
     * `contenteditable` — Indicates whether the element's content is editable.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/contenteditable
     */
    case CONTENTEDITABLE = 'contenteditable';

    /**
     * `data-*` — Custom data attributes for storing extra information on elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/data-*
     */
    case DATA = 'data';

    /**
     * `dir` — Defines the text directionality of the element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/dir
     */
    case DIR = 'dir';

    /**
     * `draggable` — Indicates whether the element can be dragged.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/draggable
     */
    case DRAGGABLE = 'draggable';

    /**
     * `enterkeyhint` — Hints what action label to present for the enter key on virtual keyboards.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/enterkeyhint
     */
    case ENTERKEYHINT = 'enterkeyhint';

    /**
     * `exportparts` — Exports shadow parts from a shadow tree to a containing tree.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/exportparts
     */
    case EXPORTPARTS = 'exportparts';

    /**
     * `hidden` — Indicates that the element is not yet, or is no longer, relevant.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/hidden
     */
    case HIDDEN = 'hidden';

    /**
     * `id` — Defines a unique identifier for the element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/id
     */
    case ID = 'id';

    /**
     * `inert` — Indicates that the element and its descendants are not interactive.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/inert
     */
    case INERT = 'inert';

    /**
     * `inputmode` — Hints at the type of data that might be entered for virtual keyboard optimization.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/inputmode
     */
    case INPUTMODE = 'inputmode';

    /**
     * `is` — Specifies that a standard HTML element should behave like a defined custom element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/is
     */
    case IS = 'is';

    /**
     * `itemid` — The unique, global identifier of an item in microdata.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/itemid
     */
    case ITEMID = 'itemid';

    /**
     * `itemprop` — Adds properties to an item in microdata.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/itemprop
     */
    case ITEMPROP = 'itemprop';

    /**
     * `itemref` — References elements that are not descendants of the element with the `itemscope` attribute.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/itemref
     */
    case ITEMREF = 'itemref';

    /**
     * `itemscope` — Defines the scope of associated metadata in microdata.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/itemscope
     */
    case ITEMSCOPE = 'itemscope';

    /**
     * `itemtype` — Specifies the URL of the vocabulary that will be used to define item properties in microdata.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/itemtype
     */
    case ITEMTYPE = 'itemtype';

    /**
     * `lang` — Defines the language of the element's content.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/lang
     */
    case LANG = 'lang';

    /**
     * `nonce` — Cryptographic nonce used by Content Security Policy to determine whether a given fetch will be allowed.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/nonce
     */
    case NONCE = 'nonce';

    /**
     * `part` — Space-separated list of part names of the element exposed to parent trees via shadow DOM.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/part
     */
    case PART = 'part';

    /**
     * `popover` — Designates an element as a popover element and specifies its type.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/popover
     */
    case POPOVER = 'popover';

    /**
     * `role` — Defines an explicit ARIA role for the element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Reference/Roles
     */
    case ROLE = 'role';

    /**
     * `slot` — Assigns a slot in a shadow DOM shadow tree to an element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/slot
     */
    case SLOT = 'slot';

    /**
     * `spellcheck` — Defines whether the element may be checked for spelling errors.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/spellcheck
     */
    case SPELLCHECK = 'spellcheck';

    /**
     * `style` — Contains inline CSS styling declarations to be applied to the element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/style
     */
    case STYLE = 'style';

    /**
     * `tabindex` — Indicates if the element can be focused and its relative order for sequential focus navigation.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/tabindex
     */
    case TABINDEX = 'tabindex';

    /**
     * `title` — Contains advisory information related to the element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/title
     */
    case TITLE = 'title';

    /**
     * `translate` — Specifies whether an element's attribute values and text content should be translated.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/translate
     */
    case TRANSLATE = 'translate';

    /**
     * `virtualkeyboardpolicy` — Controls the behavior of the virtual keyboard on devices such as tablets and phones.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/virtualkeyboardpolicy
     */
    case VIRTUALKEYBOARDPOLICY = 'virtualkeyboardpolicy';

    /**
     * `writingsuggestions` — Controls whether writing suggestions are enabled in the browser for the element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/writingsuggestions
     */
    case WRITINGSUGGESTIONS = 'writingsuggestions';
}
