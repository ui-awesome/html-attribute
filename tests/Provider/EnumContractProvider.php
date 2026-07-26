<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider;

use UIAwesome\Html\Attribute\Exception\Message;
use UIAwesome\Html\Attribute\Values\{
    Aria,
    AsValue,
    Attribute,
    Autocapitalize,
    Autocomplete,
    Autocorrect,
    Blocking,
    Charset,
    ContentEditable,
    Crossorigin,
    Data,
    Decoding,
    Direction,
    Draggable,
    ElementAttribute,
    Event,
    Fetchpriority,
    GlobalAttribute,
    HttpEquiv,
    InputMode,
    Language,
    Loading,
    MetaName,
    Popover,
    PopoverTargetAction,
    Referrerpolicy,
    Rel,
    Role,
    Target,
    Translate,
    Type
};

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\EnumContractTest} test cases.
 *
 * Freezes the public case name and backed value of every enum exposed by the package.
 */
final class EnumContractProvider
{
    /**
     * @return array<string, array{class-string, array<string, string>}>
     */
    public static function contracts(): array
    {
        return [
            'aria' => [Aria::class, self::aria()],
            'as value' => [AsValue::class, self::asValue()],
            'attribute' => [Attribute::class, self::attribute()],
            'autocapitalize' => [Autocapitalize::class, self::autocapitalize()],
            'autocomplete' => [Autocomplete::class, self::autocomplete()],
            'autocorrect' => [Autocorrect::class, self::autocorrect()],
            'blocking' => [Blocking::class, self::blocking()],
            'charset' => [Charset::class, self::charset()],
            'content editable' => [ContentEditable::class, self::contentEditable()],
            'crossorigin' => [Crossorigin::class, self::crossorigin()],
            'data' => [Data::class, self::data()],
            'decoding' => [Decoding::class, self::decoding()],
            'direction' => [Direction::class, self::direction()],
            'draggable' => [Draggable::class, self::draggable()],
            'element attribute' => [ElementAttribute::class, self::elementAttribute()],
            'event' => [Event::class, self::event()],
            'fetchpriority' => [Fetchpriority::class, self::fetchpriority()],
            'global attribute' => [GlobalAttribute::class, self::globalAttribute()],
            'http equiv' => [HttpEquiv::class, self::httpEquiv()],
            'input mode' => [InputMode::class, self::inputMode()],
            'language' => [Language::class, self::language()],
            'loading' => [Loading::class, self::loading()],
            'meta name' => [MetaName::class, self::metaName()],
            'popover' => [Popover::class, self::popover()],
            'popover target action' => [PopoverTargetAction::class, self::popoverTargetAction()],
            'referrerpolicy' => [Referrerpolicy::class, self::referrerpolicy()],
            'rel' => [Rel::class, self::rel()],
            'role' => [Role::class, self::role()],
            'target' => [Target::class, self::target()],
            'translate' => [Translate::class, self::translate()],
            'type' => [Type::class, self::type()],
            'message' => [Message::class, self::message()],
        ];
    }

    /**
     * @return array<string, array{class-string, string}>
     */
    public static function invalidValues(): array
    {
        $values = [];

        foreach (self::contracts() as $key => [$enum]) {
            $values[$key] = [$enum, '__not-a-valid-backed-value__'];
        }

        return $values;
    }

    /**
     * @return array<string, array{class-string, string, string}>
     */
    public static function validValues(): array
    {
        $values = [];

        foreach (self::contracts() as [$enum, $cases]) {
            foreach ($cases as $name => $value) {
                $values["{$enum}::{$name}"] = [$enum, $name, $value];
            }
        }

        return $values;
    }

    /**
     * @return array<string, string>
     */
    private static function aria(): array
    {
        return [
            'ACTIVEDESCENDANT' => 'aria-activedescendant',
            'ATOMIC' => 'aria-atomic',
            'AUTOCOMPLETE' => 'aria-autocomplete',
            'BRAILLELABEL' => 'aria-braillelabel',
            'BRAILLEROLEDESCRIPTION' => 'aria-brailleroledescription',
            'BUSY' => 'aria-busy',
            'CHECKED' => 'aria-checked',
            'COLCOUNT' => 'aria-colcount',
            'COLINDEX' => 'aria-colindex',
            'COLINDEXTEXT' => 'aria-colindextext',
            'COLSPAN' => 'aria-colspan',
            'CONTROLS' => 'aria-controls',
            'CURRENT' => 'aria-current',
            'DESCRIBEDBY' => 'aria-describedby',
            'DESCRIPTION' => 'aria-description',
            'DETAILS' => 'aria-details',
            'DISABLED' => 'aria-disabled',
            'ERRORMESSAGE' => 'aria-errormessage',
            'EXPANDED' => 'aria-expanded',
            'FLOWTO' => 'aria-flowto',
            'HASPOPUP' => 'aria-haspopup',
            'HIDDEN' => 'aria-hidden',
            'INVALID' => 'aria-invalid',
            'KEYSHORTCUTS' => 'aria-keyshortcuts',
            'LABEL' => 'aria-label',
            'LABELLEDBY' => 'aria-labelledby',
            'LEVEL' => 'aria-level',
            'LIVE' => 'aria-live',
            'MODAL' => 'aria-modal',
            'MULTILINE' => 'aria-multiline',
            'MULTISELECTABLE' => 'aria-multiselectable',
            'ORIENTATION' => 'aria-orientation',
            'OWNS' => 'aria-owns',
            'PLACEHOLDER' => 'aria-placeholder',
            'POSINSET' => 'aria-posinset',
            'PRESSED' => 'aria-pressed',
            'READONLY' => 'aria-readonly',
            'RELEVANT' => 'aria-relevant',
            'REQUIRED' => 'aria-required',
            'ROLEDESCRIPTION' => 'aria-roledescription',
            'ROWCOUNT' => 'aria-rowcount',
            'ROWINDEX' => 'aria-rowindex',
            'ROWINDEXTEXT' => 'aria-rowindextext',
            'ROWSPAN' => 'aria-rowspan',
            'SELECTED' => 'aria-selected',
            'SETSIZE' => 'aria-setsize',
            'SORT' => 'aria-sort',
            'VALUEMAX' => 'aria-valuemax',
            'VALUEMIN' => 'aria-valuemin',
            'VALUENOW' => 'aria-valuenow',
            'VALUETEXT' => 'aria-valuetext',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function asValue(): array
    {
        return [
            'AUDIO' => 'audio',
            'DOCUMENT' => 'document',
            'EMBED' => 'embed',
            'FETCH' => 'fetch',
            'FONT' => 'font',
            'IMAGE' => 'image',
            'OBJECT' => 'object',
            'SCRIPT' => 'script',
            'STYLE' => 'style',
            'TRACK' => 'track',
            'VIDEO' => 'video',
            'WORKER' => 'worker',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function attribute(): array
    {
        return [
            'ACCEPT' => 'accept',
            'AUTOCOMPLETE' => 'autocomplete',
            'CAPTURE' => 'capture',
            'CHECKED' => 'checked',
            'CONTENT' => 'content',
            'CROSSORIGIN' => 'crossorigin',
            'DIRNAME' => 'dirname',
            'DISABLED' => 'disabled',
            'ELEMENTTIMING' => 'elementtiming',
            'FETCHPRIORITY' => 'fetchpriority',
            'FOR' => 'for',
            'FORM' => 'form',
            'INTEGRITY' => 'integrity',
            'MAX' => 'max',
            'MAXLENGTH' => 'maxlength',
            'MEDIA' => 'media',
            'MIN' => 'min',
            'MINLENGTH' => 'minlength',
            'MULTIPLE' => 'multiple',
            'PATTERN' => 'pattern',
            'PLACEHOLDER' => 'placeholder',
            'READONLY' => 'readonly',
            'REFERRERPOLICY' => 'referrerpolicy',
            'REL' => 'rel',
            'REQUIRED' => 'required',
            'SIZE' => 'size',
            'SRC' => 'src',
            'STEP' => 'step',
            'TARGET' => 'target',
            'TYPE' => 'type',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function autocapitalize(): array
    {
        return [
            'CHARACTERS' => 'characters',
            'NONE' => 'none',
            'OFF' => 'off',
            'ON' => 'on',
            'SENTENCES' => 'sentences',
            'WORDS' => 'words',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function autocomplete(): array
    {
        return [
            'OFF' => 'off',
            'ON' => 'on',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function autocorrect(): array
    {
        return [
            'OFF' => 'off',
            'ON' => 'on',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function blocking(): array
    {
        return [
            'RENDER' => 'render',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function charset(): array
    {
        return [
            'BIG5' => 'big5',
            'EUC_JP' => 'euc-jp',
            'EUC_KR' => 'euc-kr',
            'GB2312' => 'gb2312',
            'GBK' => 'gbk',
            'ISO_2022_JP' => 'iso-2022-jp',
            'ISO_8859_1' => 'iso-8859-1',
            'ISO_8859_15' => 'iso-8859-15',
            'ISO_8859_2' => 'iso-8859-2',
            'ISO_8859_6' => 'iso-8859-6',
            'ISO_8859_7' => 'iso-8859-7',
            'ISO_8859_8' => 'iso-8859-8',
            'ISO_8859_9' => 'iso-8859-9',
            'KOI8_R' => 'koi8-r',
            'KOI8_U' => 'koi8-u',
            'SHIFT_JIS' => 'shift_jis',
            'UTF_16' => 'utf-16',
            'UTF_16BE' => 'utf-16be',
            'UTF_16LE' => 'utf-16le',
            'UTF_32' => 'utf-32',
            'UTF_32BE' => 'utf-32be',
            'UTF_32LE' => 'utf-32le',
            'UTF_8' => 'utf-8',
            'WINDOWS_1251' => 'windows-1251',
            'WINDOWS_1252' => 'windows-1252',
            'WINDOWS_1253' => 'windows-1253',
            'WINDOWS_1254' => 'windows-1254',
            'WINDOWS_1255' => 'windows-1255',
            'WINDOWS_1256' => 'windows-1256',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function contentEditable(): array
    {
        return [
            'FALSE' => 'false',
            'PLAINTEXT_ONLY' => 'plaintext-only',
            'TRUE' => 'true',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function crossorigin(): array
    {
        return [
            'ANONYMOUS' => 'anonymous',
            'USE_CREDENTIALS' => 'use-credentials',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function data(): array
    {
        return [
            'ACTION' => 'data-action',
            'CONFIRM' => 'data-confirm',
            'CONTENT' => 'data-content',
            'DISMISS' => 'data-dismiss',
            'ID' => 'data-id',
            'KEY' => 'data-key',
            'METHOD' => 'data-method',
            'NAME' => 'data-name',
            'PARENT' => 'data-parent',
            'PLACEMENT' => 'data-placement',
            'TARGET' => 'data-target',
            'TOGGLE' => 'data-toggle',
            'TRIGGER' => 'data-trigger',
            'URL' => 'data-url',
            'VALUE' => 'data-value',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function decoding(): array
    {
        return [
            'ASYNC' => 'async',
            'AUTO' => 'auto',
            'SYNC' => 'sync',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function direction(): array
    {
        return [
            'AUTO' => 'auto',
            'LTR' => 'ltr',
            'RTL' => 'rtl',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function draggable(): array
    {
        return [
            'FALSE' => 'false',
            'TRUE' => 'true',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function elementAttribute(): array
    {
        return [
            'ALT' => 'alt',
            'AS' => 'as',
            'AUTOPLAY' => 'autoplay',
            'BLOCKING' => 'blocking',
            'CHARSET' => 'charset',
            'CLOSEDBY' => 'closedby',
            'CONTROLS' => 'controls',
            'CONTROLSLIST' => 'controlslist',
            'DECODING' => 'decoding',
            'DEFAULT' => 'default',
            'DISABLEREMOTEPLAYBACK' => 'disableremoteplayback',
            'DOWNLOAD' => 'download',
            'HEIGHT' => 'height',
            'HREF' => 'href',
            'HREFLANG' => 'hreflang',
            'HTTP_EQUIV' => 'http-equiv',
            'IMAGESIZES' => 'imagesizes',
            'IMAGESRCSET' => 'imagesrcset',
            'KIND' => 'kind',
            'LABEL' => 'label',
            'LIST' => 'list',
            'LOADING' => 'loading',
            'LOOP' => 'loop',
            'MUTED' => 'muted',
            'NAME' => 'name',
            'OPEN' => 'open',
            'PING' => 'ping',
            'POPOVERTARGET' => 'popovertarget',
            'POPOVERTARGETACTION' => 'popovertargetaction',
            'PRELOAD' => 'preload',
            'SELECTED' => 'selected',
            'SIZES' => 'sizes',
            'SRCLANG' => 'srclang',
            'SRCSET' => 'srcset',
            'USEMAP' => 'usemap',
            'VALUE' => 'value',
            'WIDTH' => 'width',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function event(): array
    {
        return [
            'ABORT' => 'onabort',
            'ANIMATION_CANCEL' => 'onanimationcancel',
            'ANIMATION_END' => 'onanimationend',
            'ANIMATION_ITERATION' => 'onanimationiteration',
            'ANIMATION_START' => 'onanimationstart',
            'AUX_CLICK' => 'onauxclick',
            'BEFORE_INPUT' => 'onbeforeinput',
            'BEFORE_MATCH' => 'onbeforematch',
            'BEFORE_TOGGLE' => 'onbeforetoggle',
            'BLUR' => 'onblur',
            'CAN_PLAY' => 'oncanplay',
            'CAN_PLAY_THROUGH' => 'oncanplaythrough',
            'CANCEL' => 'oncancel',
            'CHANGE' => 'onchange',
            'CLICK' => 'onclick',
            'CLOSE' => 'onclose',
            'COMMAND' => 'oncommand',
            'CONTENT_VISIBILITY_AUTO_STATE_CHANGE' => 'oncontentvisibilityautostatechange',
            'CONTEXT_LOST' => 'oncontextlost',
            'CONTEXT_MENU' => 'oncontextmenu',
            'CONTEXT_RESTORED' => 'oncontextrestored',
            'COPY' => 'oncopy',
            'CUE_CHANGE' => 'oncuechange',
            'CUT' => 'oncut',
            'DOUBLE_CLICK' => 'ondblclick',
            'DRAG' => 'ondrag',
            'DRAG_END' => 'ondragend',
            'DRAG_ENTER' => 'ondragenter',
            'DRAG_LEAVE' => 'ondragleave',
            'DRAG_OVER' => 'ondragover',
            'DRAG_START' => 'ondragstart',
            'DROP' => 'ondrop',
            'DURATION_CHANGE' => 'ondurationchange',
            'EMPTIED' => 'onemptied',
            'ENDED' => 'onended',
            'ERROR' => 'onerror',
            'FOCUS' => 'onfocus',
            'FOCUS_IN' => 'onfocusin',
            'FOCUS_OUT' => 'onfocusout',
            'FORM_DATA' => 'onformdata',
            'FULLSCREEN_CHANGE' => 'onfullscreenchange',
            'FULLSCREEN_ERROR' => 'onfullscreenerror',
            'GESTURE_CHANGE' => 'ongesturechange',
            'GESTURE_END' => 'ongestureend',
            'GESTURE_START' => 'ongesturestart',
            'GOT_POINTER_CAPTURE' => 'ongotpointercapture',
            'INPUT' => 'oninput',
            'INVALID' => 'oninvalid',
            'KEY_DOWN' => 'onkeydown',
            'KEY_PRESS' => 'onkeypress',
            'KEY_UP' => 'onkeyup',
            'LOAD' => 'onload',
            'LOAD_START' => 'onloadstart',
            'LOADED_DATA' => 'onloadeddata',
            'LOADED_METADATA' => 'onloadedmetadata',
            'LOST_POINTER_CAPTURE' => 'onlostpointercapture',
            'MOUSE_DOWN' => 'onmousedown',
            'MOUSE_ENTER' => 'onmouseenter',
            'MOUSE_LEAVE' => 'onmouseleave',
            'MOUSE_MOVE' => 'onmousemove',
            'MOUSE_OUT' => 'onmouseout',
            'MOUSE_OVER' => 'onmouseover',
            'MOUSE_UP' => 'onmouseup',
            'MOUSE_WHEEL' => 'onmousewheel',
            'PASTE' => 'onpaste',
            'PAUSE' => 'onpause',
            'PLAY' => 'onplay',
            'PLAYING' => 'onplaying',
            'POINTER_CANCEL' => 'onpointercancel',
            'POINTER_DOWN' => 'onpointerdown',
            'POINTER_ENTER' => 'onpointerenter',
            'POINTER_LEAVE' => 'onpointerleave',
            'POINTER_MOVE' => 'onpointermove',
            'POINTER_OUT' => 'onpointerout',
            'POINTER_OVER' => 'onpointerover',
            'POINTER_RAW_UPDATE' => 'onpointerrawupdate',
            'POINTER_UP' => 'onpointerup',
            'PROGRESS' => 'onprogress',
            'RATE_CHANGE' => 'onratechange',
            'RESET' => 'onreset',
            'RESIZE' => 'onresize',
            'SCROLL' => 'onscroll',
            'SCROLL_END' => 'onscrollend',
            'SCROLL_SNAP_CHANGE' => 'onscrollsnapchange',
            'SCROLL_SNAP_CHANGING' => 'onscrollsnapchanging',
            'SECURITY_POLICY_VIOLATION' => 'onsecuritypolicyviolation',
            'SEEKED' => 'onseeked',
            'SEEKING' => 'onseeking',
            'SELECT' => 'onselect',
            'SELECT_START' => 'onselectstart',
            'SELECTION_CHANGE' => 'onselectionchange',
            'SLOT_CHANGE' => 'onslotchange',
            'STALLED' => 'onstalled',
            'SUBMIT' => 'onsubmit',
            'SUSPEND' => 'onsuspend',
            'TIME_UPDATE' => 'ontimeupdate',
            'TOGGLE' => 'ontoggle',
            'TOUCH_CANCEL' => 'ontouchcancel',
            'TOUCH_END' => 'ontouchend',
            'TOUCH_MOVE' => 'ontouchmove',
            'TOUCH_START' => 'ontouchstart',
            'TRANSITION_CANCEL' => 'ontransitioncancel',
            'TRANSITION_END' => 'ontransitionend',
            'TRANSITION_RUN' => 'ontransitionrun',
            'TRANSITION_START' => 'ontransitionstart',
            'VOLUME_CHANGE' => 'onvolumechange',
            'WAITING' => 'onwaiting',
            'WEBKIT_MOUSE_FORCE_CHANGED' => 'onwebkitmouseforcechanged',
            'WEBKIT_MOUSE_FORCE_DOWN' => 'onwebkitmouseforcedown',
            'WEBKIT_MOUSE_FORCE_UP' => 'onwebkitmouseforceup',
            'WEBKIT_MOUSE_FORCE_WILL_BEGIN' => 'onwebkitmouseforcewillbegin',
            'WHEEL' => 'onwheel',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function fetchpriority(): array
    {
        return [
            'AUTO' => 'auto',
            'HIGH' => 'high',
            'LOW' => 'low',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function globalAttribute(): array
    {
        return [
            'ACCESSKEY' => 'accesskey',
            'ANCHOR' => 'anchor',
            'AUTOCAPITALIZE' => 'autocapitalize',
            'AUTOCORRECT' => 'autocorrect',
            'AUTOFOCUS' => 'autofocus',
            'CLASS_CSS' => 'class',
            'CONTENTEDITABLE' => 'contenteditable',
            'DATA' => 'data',
            'DIR' => 'dir',
            'DRAGGABLE' => 'draggable',
            'ENTERKEYHINT' => 'enterkeyhint',
            'EXPORTPARTS' => 'exportparts',
            'HIDDEN' => 'hidden',
            'ID' => 'id',
            'INERT' => 'inert',
            'INPUTMODE' => 'inputmode',
            'IS' => 'is',
            'ITEMID' => 'itemid',
            'ITEMPROP' => 'itemprop',
            'ITEMREF' => 'itemref',
            'ITEMSCOPE' => 'itemscope',
            'ITEMTYPE' => 'itemtype',
            'LANG' => 'lang',
            'NONCE' => 'nonce',
            'PART' => 'part',
            'POPOVER' => 'popover',
            'ROLE' => 'role',
            'SLOT' => 'slot',
            'SPELLCHECK' => 'spellcheck',
            'STYLE' => 'style',
            'TABINDEX' => 'tabindex',
            'TITLE' => 'title',
            'TRANSLATE' => 'translate',
            'VIRTUALKEYBOARDPOLICY' => 'virtualkeyboardpolicy',
            'WRITINGSUGGESTIONS' => 'writingsuggestions',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function httpEquiv(): array
    {
        return [
            'CONTENT_SECURITY_POLICY' => 'content-security-policy',
            'CONTENT_TYPE' => 'content-type',
            'DEFAULT_STYLE' => 'default-style',
            'REFRESH' => 'refresh',
            'X_UA_COMPATIBLE' => 'x-ua-compatible',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function inputMode(): array
    {
        return [
            'DECIMAL' => 'decimal',
            'EMAIL' => 'email',
            'NONE' => 'none',
            'NUMERIC' => 'numeric',
            'SEARCH' => 'search',
            'TEL' => 'tel',
            'TEXT' => 'text',
            'URL' => 'url',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function language(): array
    {
        return [
            'ARABIC' => 'ar',
            'BENGALI' => 'bn',
            'BULGARIAN' => 'bg',
            'CATALAN' => 'ca',
            'CHINESE' => 'zh',
            'CHINESE_SIMPLIFIED' => 'zh-CN',
            'CHINESE_TRADITIONAL' => 'zh-TW',
            'CROATIAN' => 'hr',
            'CZECH' => 'cs',
            'DANISH' => 'da',
            'DUTCH' => 'nl',
            'ENGLISH' => 'en',
            'ENGLISH_UK' => 'en-GB',
            'ENGLISH_US' => 'en-US',
            'ESTONIAN' => 'et',
            'FINNISH' => 'fi',
            'FRENCH' => 'fr',
            'GERMAN' => 'de',
            'GREEK' => 'el',
            'HEBREW' => 'he',
            'HINDI' => 'hi',
            'HUNGARIAN' => 'hu',
            'INDONESIAN' => 'id',
            'ITALIAN' => 'it',
            'JAPANESE' => 'ja',
            'KOREAN' => 'ko',
            'LATVIAN' => 'lv',
            'LITHUANIAN' => 'lt',
            'NORWEGIAN' => 'no',
            'POLISH' => 'pl',
            'PORTUGUESE' => 'pt',
            'PORTUGUESE_BRAZIL' => 'pt-BR',
            'ROMANIAN' => 'ro',
            'RUSSIAN' => 'ru',
            'SERBIAN' => 'sr',
            'SLOVAK' => 'sk',
            'SLOVENIAN' => 'sl',
            'SPANISH' => 'es',
            'SPANISH_LATIN_AMERICA' => 'es-419',
            'SPANISH_SPAIN' => 'es-ES',
            'SWEDISH' => 'sv',
            'THAI' => 'th',
            'TURKISH' => 'tr',
            'UKRAINIAN' => 'uk',
            'VIETNAMESE' => 'vi',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function loading(): array
    {
        return [
            'EAGER' => 'eager',
            'LAZY' => 'lazy',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function message(): array
    {
        return [
            'ATTRIBUTE_INVALID_VALUE' => "Invalid value '%s' for attribute '%s'. Expected: '%s'.",
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function metaName(): array
    {
        return [
            'APPLICATION_NAME' => 'application-name',
            'AUTHOR' => 'author',
            'COLOR_SCHEME' => 'color-scheme',
            'CREATOR' => 'creator',
            'DESCRIPTION' => 'description',
            'GENERATOR' => 'generator',
            'KEYWORDS' => 'keywords',
            'PUBLISHER' => 'publisher',
            'REFERRER' => 'referrer',
            'ROBOTS' => 'robots',
            'THEME_COLOR' => 'theme-color',
            'VIEWPORT' => 'viewport',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function popover(): array
    {
        return [
            'AUTO' => 'auto',
            'HINT' => 'hint',
            'MANUAL' => 'manual',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function popoverTargetAction(): array
    {
        return [
            'HIDE' => 'hide',
            'SHOW' => 'show',
            'TOGGLE' => 'toggle',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function referrerpolicy(): array
    {
        return [
            'NO_REFERRER' => 'no-referrer',
            'NO_REFERRER_WHEN_DOWNGRADE' => 'no-referrer-when-downgrade',
            'ORIGIN' => 'origin',
            'ORIGIN_WHEN_CROSS_ORIGIN' => 'origin-when-cross-origin',
            'SAME_ORIGIN' => 'same-origin',
            'STRICT_ORIGIN' => 'strict-origin',
            'STRICT_ORIGIN_WHEN_CROSS_ORIGIN' => 'strict-origin-when-cross-origin',
            'UNSAFE_URL' => 'unsafe-url',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function rel(): array
    {
        return [
            'ALTERNATE' => 'alternate',
            'APPLE_TOUCH_ICON' => 'apple-touch-icon',
            'APPLE_TOUCH_STARTUP_IMAGE' => 'apple-touch-startup-image',
            'AUTHOR' => 'author',
            'BOOKMARK' => 'bookmark',
            'CANONICAL' => 'canonical',
            'COMPRESSION_DICTIONARY' => 'compression-dictionary',
            'DNS_PREFETCH' => 'dns-prefetch',
            'EXPECT' => 'expect',
            'EXTERNAL' => 'external',
            'HELP' => 'help',
            'ICON' => 'icon',
            'LICENSE' => 'license',
            'MANIFEST' => 'manifest',
            'ME' => 'me',
            'MODULEPRELOAD' => 'modulepreload',
            'NEXT' => 'next',
            'NOFOLLOW' => 'nofollow',
            'NOOPENER' => 'noopener',
            'NOREFERRER' => 'noreferrer',
            'OPENER' => 'opener',
            'PINGBACK' => 'pingback',
            'PRECONNECT' => 'preconnect',
            'PREFETCH' => 'prefetch',
            'PRELOAD' => 'preload',
            'PRERENDER' => 'prerender',
            'PREV' => 'prev',
            'PRIVACY_POLICY' => 'privacy-policy',
            'SEARCH' => 'search',
            'SHORTCUT' => 'shortcut',
            'STYLESHEET' => 'stylesheet',
            'TAG' => 'tag',
            'TERMS_OF_SERVICE' => 'terms-of-service',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function role(): array
    {
        return [
            'ALERT' => 'alert',
            'ALERT_DIALOG' => 'alertdialog',
            'APPLICATION' => 'application',
            'ARTICLE' => 'article',
            'ASSOCIATIONLIST' => 'associationlist',
            'ASSOCIATIONLISTITEMKEY' => 'associationlistitemkey',
            'ASSOCIATIONLISTITEMVALUE' => 'associationlistitemvalue',
            'BANNER' => 'banner',
            'BLOCKQUOTE' => 'blockquote',
            'BUTTON' => 'button',
            'CAPTION' => 'caption',
            'CELL' => 'cell',
            'CHECKBOX' => 'checkbox',
            'CODE' => 'code',
            'COLUMN_HEADER' => 'columnheader',
            'COMBOBOX' => 'combobox',
            'COMMAND' => 'command',
            'COMMENT' => 'comment',
            'COMPLEMENTARY' => 'complementary',
            'COMPOSITE' => 'composite',
            'CONTENTINFO' => 'contentinfo',
            'DEFINITION' => 'definition',
            'DELETION' => 'deletion',
            'DIALOG' => 'dialog',
            'DIRECTORY' => 'directory',
            'DOCUMENT' => 'document',
            'EMPHASIS' => 'emphasis',
            'FEED' => 'feed',
            'FIGURE' => 'figure',
            'FORM' => 'form',
            'GENERIC' => 'generic',
            'GRID' => 'grid',
            'GRIDCELL' => 'gridcell',
            'GROUP' => 'group',
            'HEADING' => 'heading',
            'IMG' => 'img',
            'INPUT' => 'input',
            'INSERTION' => 'insertion',
            'LANDMARK' => 'landmark',
            'LINK' => 'link',
            'LIST' => 'list',
            'LISTBOX' => 'listbox',
            'LISTITEM' => 'listitem',
            'LOG' => 'log',
            'MAIN' => 'main',
            'MARK' => 'mark',
            'MARQUEE' => 'marquee',
            'MATH' => 'math',
            'MENU' => 'menu',
            'MENUBAR' => 'menubar',
            'MENUITEM' => 'menuitem',
            'MENUITEM_CHECKBOX' => 'menuitemcheckbox',
            'MENUITEM_RADIO' => 'menuitemradio',
            'METER' => 'meter',
            'NAVIGATION' => 'navigation',
            'NONE' => 'none',
            'NOTE' => 'note',
            'OPTION' => 'option',
            'PARAGRAPH' => 'paragraph',
            'PRESENTATION' => 'presentation',
            'PROGRESSBAR' => 'progressbar',
            'RADIO' => 'radio',
            'RADIOGROUP' => 'radiogroup',
            'RANGE' => 'range',
            'REGION' => 'region',
            'ROLETYPE' => 'roletype',
            'ROW' => 'row',
            'ROWGROUP' => 'rowgroup',
            'ROWHEADER' => 'rowheader',
            'SCROLLBAR' => 'scrollbar',
            'SEARCH' => 'search',
            'SEARCHBOX' => 'searchbox',
            'SECTION' => 'section',
            'SECTIONHEAD' => 'sectionhead',
            'SELECT' => 'select',
            'SEPARATOR' => 'separator',
            'SLIDER' => 'slider',
            'SPINBUTTON' => 'spinbutton',
            'STATUS' => 'status',
            'STRONG' => 'strong',
            'STRUCTURE' => 'structure',
            'SUBSCRIPT' => 'subscript',
            'SUGGESTION' => 'suggestion',
            'SUPERSCRIPT' => 'superscript',
            'SWITCH' => 'switch',
            'TAB' => 'tab',
            'TABLIST' => 'tablist',
            'TABPANEL' => 'tabpanel',
            'TERM' => 'term',
            'TEXTBOX' => 'textbox',
            'TIME' => 'time',
            'TIMER' => 'timer',
            'TOOLBAR' => 'toolbar',
            'TOOLTIP' => 'tooltip',
            'TREE' => 'tree',
            'TREEGRID' => 'treegrid',
            'TREEITEM' => 'treeitem',
            'WIDGET' => 'widget',
            'WINDOW' => 'window',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function target(): array
    {
        return [
            'BLANK' => '_blank',
            'PARENT' => '_parent',
            'SELF' => '_self',
            'TOP' => '_top',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function translate(): array
    {
        return [
            'NO' => 'no',
            'YES' => 'yes',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function type(): array
    {
        return [
            'BUTTON' => 'button',
            'CHECKBOX' => 'checkbox',
            'COLOR' => 'color',
            'DATE' => 'date',
            'DATETIME_LOCAL' => 'datetime-local',
            'DECIMAL' => '1',
            'EMAIL' => 'email',
            'FILE' => 'file',
            'HIDDEN' => 'hidden',
            'IMAGE' => 'image',
            'IMPORTMAP' => 'importmap',
            'LOWER_ALPHA' => 'a',
            'LOWER_ROMAN' => 'i',
            'MODULE' => 'module',
            'MONTH' => 'month',
            'NUMBER' => 'number',
            'PASSWORD' => 'password',
            'RADIO' => 'radio',
            'RANGE' => 'range',
            'RESET' => 'reset',
            'SEARCH' => 'search',
            'SPECULATIONRULES' => 'speculationrules',
            'SUBMIT' => 'submit',
            'TEL' => 'tel',
            'TEXT' => 'text',
            'TEXT_CSS' => 'text/css',
            'TEXT_HTML' => 'text/html',
            'TEXT_JAVASCRIPT' => 'text/javascript',
            'TIME' => 'time',
            'UPPER_ALPHA' => 'A',
            'UPPER_ROMAN' => 'I',
            'URL' => 'url',
            'WEEK' => 'week',
        ];
    }
}
