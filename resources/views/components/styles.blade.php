@props(['breeze' => false])

@if ($breeze)
<style {{ $attributes }}>
trix-editor {
    border: 1px solid #bbb;
    border-radius: 3px;
    margin: 0;
    padding: 0.4em 0.6em;
    min-height: 5em;
    outline: none; }

  trix-toolbar * {
    box-sizing: border-box; }

  trix-toolbar .trix-button-row {
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-between;
    overflow-x: auto; }

  trix-toolbar .trix-button-group {
    display: flex;
    margin-bottom: 10px;
    border: 0;
    border-radius: 3px; }
    trix-toolbar .trix-button-group:not(:first-child) {
      margin-left: 1.5vw; }
      @media (max-width: 768px) {
        trix-toolbar .trix-button-group:not(:first-child) {
          margin-left: 0; } }

  trix-toolbar .trix-button-group-spacer {
    flex-grow: 1; }
    @media (max-width: 768px) {
      trix-toolbar .trix-button-group-spacer {
        display: none; } }

  trix-toolbar .trix-button {
    position: relative;
    float: left;
    color: rgba(0, 0, 0, 0.6);
    font-size: 0.75em;
    font-weight: 600;
    white-space: nowrap;
    padding: 0 0.5em;
    margin: 0;
    outline: none;
    border: none;
    border-radius: 0;
    background: transparent; }
    trix-toolbar .trix-button:not(:first-child) {
      border-left: 1px solid #ccc; }
    trix-toolbar .trix-button.trix-active {
      color: black; }
    trix-toolbar .trix-button:not(:disabled) {
      cursor: pointer; }
    trix-toolbar .trix-button:disabled {
      color: rgba(0, 0, 0, 0.125); }
    @media (max-width: 768px) {
      trix-toolbar .trix-button {
        letter-spacing: -0.01em;
        padding: 0 0.3em; } }

  trix-toolbar .trix-button--icon {
    font-size: inherit;
    width: 2.6em;
    height: 1.6em;
    max-width: calc(0.8em + 4vw);
    text-indent: -9999px; }
    @media (max-width: 768px) {
      trix-toolbar .trix-button--icon {
        height: 2em;
        max-width: calc(0.8em + 3.5vw); } }
    trix-toolbar .trix-button--icon::before {
      display: inline-block;
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      opacity: 0.6;
      content: "";
      background-position: center;
      background-repeat: no-repeat;
      background-size: contain; }
      @media (max-width: 768px) {
        trix-toolbar .trix-button--icon::before {
          right: 6%;
          left: 6%; } }
    trix-toolbar .trix-button--icon.trix-active::before {
      opacity: 1; }
    trix-toolbar .trix-button--icon:disabled::before {
      opacity: 0.125; }

  trix-toolbar .trix-button--icon-attach::before {
    background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M10.5%2018V7.5c0-2.25%203-2.25%203%200V18c0%204.125-6%204.125-6%200V7.5c0-6.375%209-6.375%209%200V18%22%20stroke%3D%22%23000%22%20stroke-width%3D%222%22%20stroke-miterlimit%3D%2210%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%2F%3E%3C%2Fsvg%3E");
    top: 8%;
    bottom: 4%; }

  trix-toolbar .trix-button--icon-bold::before {
    background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M6.522%2019.242a.5.5%200%200%201-.5-.5V5.35a.5.5%200%200%201%20.5-.5h5.783c1.347%200%202.46.345%203.24.982.783.64%201.216%201.562%201.216%202.683%200%201.13-.587%202.129-1.476%202.71a.35.35%200%200%200%20.049.613c1.259.56%202.101%201.742%202.101%203.22%200%201.282-.483%202.334-1.363%203.063-.876.726-2.132%201.12-3.66%201.12h-5.89ZM9.27%207.347v3.362h1.97c.766%200%201.347-.17%201.733-.464.38-.291.587-.716.587-1.27%200-.53-.183-.928-.513-1.198-.334-.273-.838-.43-1.505-.43H9.27Zm0%205.606v3.791h2.389c.832%200%201.448-.177%201.853-.497.399-.315.614-.786.614-1.423%200-.62-.22-1.077-.63-1.385-.418-.313-1.053-.486-1.905-.486H9.27Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

  trix-toolbar .trix-button--icon-italic::before {
    background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M9%205h6.5v2h-2.23l-2.31%2010H13v2H6v-2h2.461l2.306-10H9V5Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

  trix-toolbar .trix-button--icon-link::before {
    background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M18.948%205.258a4.337%204.337%200%200%200-6.108%200L11.217%206.87a.993.993%200%200%200%200%201.41c.392.39%201.027.39%201.418%200l1.623-1.613a2.323%202.323%200%200%201%203.271%200%202.29%202.29%200%200%201%200%203.251l-2.393%202.38a3.021%203.021%200%200%201-4.255%200l-.05-.049a1.007%201.007%200%200%200-1.418%200%20.993.993%200%200%200%200%201.41l.05.049a5.036%205.036%200%200%200%207.091%200l2.394-2.38a4.275%204.275%200%200%200%200-6.072Zm-13.683%2013.6a4.337%204.337%200%200%200%206.108%200l1.262-1.255a.993.993%200%200%200%200-1.41%201.007%201.007%200%200%200-1.418%200L9.954%2017.45a2.323%202.323%200%200%201-3.27%200%202.29%202.29%200%200%201%200-3.251l2.344-2.331a2.579%202.579%200%200%201%203.631%200c.392.39%201.027.39%201.419%200a.993.993%200%200%200%200-1.41%204.593%204.593%200%200%200-6.468%200l-2.345%202.33a4.275%204.275%200%200%200%200%206.072Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

  trix-toolbar .trix-button--icon-strike::before {
    background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M6%2014.986c.088%202.647%202.246%204.258%205.635%204.258%203.496%200%205.713-1.728%205.713-4.463%200-.275-.02-.536-.062-.781h-3.461c.398.293.573.654.573%201.123%200%201.035-1.074%201.787-2.646%201.787-1.563%200-2.773-.762-2.91-1.924H6ZM6.432%2010h3.763c-.632-.314-.914-.715-.914-1.273%200-1.045.977-1.739%202.432-1.739%201.475%200%202.52.723%202.617%201.914h2.764c-.05-2.548-2.11-4.238-5.39-4.238-3.145%200-5.392%201.719-5.392%204.316%200%20.363.04.703.12%201.02ZM4%2011a1%201%200%201%200%200%202h15a1%201%200%201%200%200-2H4Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

  trix-toolbar .trix-button--icon-quote::before {
    background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M4.581%208.471c.44-.5%201.056-.834%201.758-.995C8.074%207.17%209.201%207.822%2010%208.752c1.354%201.578%201.33%203.555.394%205.277-.941%201.731-2.788%203.163-4.988%203.56a.622.622%200%200%201-.653-.317c-.113-.205-.121-.49.16-.764.294-.286.567-.566.791-.835.222-.266.413-.54.524-.815.113-.28.156-.597.026-.908-.128-.303-.39-.524-.72-.69a3.02%203.02%200%200%201-1.674-2.7c0-.905.283-1.59.72-2.088Zm9.419%200c.44-.5%201.055-.834%201.758-.995%201.734-.306%202.862.346%203.66%201.276%201.355%201.578%201.33%203.555.395%205.277-.941%201.731-2.789%203.163-4.988%203.56a.622.622%200%200%201-.653-.317c-.113-.205-.122-.49.16-.764.294-.286.567-.566.791-.835.222-.266.412-.54.523-.815.114-.28.157-.597.026-.908-.127-.303-.39-.524-.72-.69a3.02%203.02%200%200%201-1.672-2.701c0-.905.283-1.59.72-2.088Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

  trix-toolbar .trix-button--icon-heading-1::before {
    background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M21.5%207.5v-3h-12v3H14v13h3v-13h4.5ZM9%2013.5h3.5v-3h-10v3H6v7h3v-7Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

  trix-toolbar .trix-button--icon-code::before {
    background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M3.293%2011.293a1%201%200%200%200%200%201.414l4%204a1%201%200%201%200%201.414-1.414L5.414%2012l3.293-3.293a1%201%200%200%200-1.414-1.414l-4%204Zm13.414%205.414%204-4a1%201%200%200%200%200-1.414l-4-4a1%201%200%201%200-1.414%201.414L18.586%2012l-3.293%203.293a1%201%200%200%200%201.414%201.414Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

  trix-toolbar .trix-button--icon-bullet-list::before {
    background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M5%207.5a1.5%201.5%200%201%200%200-3%201.5%201.5%200%200%200%200%203ZM8%206a1%201%200%200%201%201-1h11a1%201%200%201%201%200%202H9a1%201%200%200%201-1-1Zm1%205a1%201%200%201%200%200%202h11a1%201%200%201%200%200-2H9Zm0%206a1%201%200%201%200%200%202h11a1%201%200%201%200%200-2H9Zm-2.5-5a1.5%201.5%200%201%201-3%200%201.5%201.5%200%200%201%203%200ZM5%2019.5a1.5%201.5%200%201%200%200-3%201.5%201.5%200%200%200%200%203Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

  trix-toolbar .trix-button--icon-number-list::before {
    background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M3%204h2v4H4V5H3V4Zm5%202a1%201%200%200%201%201-1h11a1%201%200%201%201%200%202H9a1%201%200%200%201-1-1Zm1%205a1%201%200%201%200%200%202h11a1%201%200%201%200%200-2H9Zm0%206a1%201%200%201%200%200%202h11a1%201%200%201%200%200-2H9Zm-3.5-7H6v1l-1.5%202H6v1H3v-1l1.667-2H3v-1h2.5ZM3%2017v-1h3v4H3v-1h2v-.5H4v-1h1V17H3Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

  trix-toolbar .trix-button--icon-undo::before {
    background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M3%2014a1%201%200%200%200%201%201h6a1%201%200%201%200%200-2H6.257c2.247-2.764%205.151-3.668%207.579-3.264%202.589.432%204.739%202.356%205.174%205.405a1%201%200%200%200%201.98-.283c-.564-3.95-3.415-6.526-6.825-7.095C11.084%207.25%207.63%208.377%205%2011.39V8a1%201%200%200%200-2%200v6Zm2-1Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

  trix-toolbar .trix-button--icon-redo::before {
    background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M21%2014a1%201%200%200%201-1%201h-6a1%201%200%201%201%200-2h3.743c-2.247-2.764-5.151-3.668-7.579-3.264-2.589.432-4.739%202.356-5.174%205.405a1%201%200%200%201-1.98-.283c.564-3.95%203.415-6.526%206.826-7.095%203.08-.513%206.534.614%209.164%203.626V8a1%201%200%201%201%202%200v6Zm-2-1Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

  trix-toolbar .trix-button--icon-decrease-nesting-level::before {
    background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M5%206a1%201%200%200%201%201-1h12a1%201%200%201%201%200%202H6a1%201%200%200%201-1-1Zm4%205a1%201%200%201%200%200%202h9a1%201%200%201%200%200-2H9Zm-3%206a1%201%200%201%200%200%202h12a1%201%200%201%200%200-2H6Zm-3.707-5.707a1%201%200%200%200%200%201.414l2%202a1%201%200%201%200%201.414-1.414L4.414%2012l1.293-1.293a1%201%200%200%200-1.414-1.414l-2%202Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

  trix-toolbar .trix-button--icon-increase-nesting-level::before {
    background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M5%206a1%201%200%200%201%201-1h12a1%201%200%201%201%200%202H6a1%201%200%200%201-1-1Zm4%205a1%201%200%201%200%200%202h9a1%201%200%201%200%200-2H9Zm-3%206a1%201%200%201%200%200%202h12a1%201%200%201%200%200-2H6Zm-2.293-2.293%202-2a1%201%200%200%200%200-1.414l-2-2a1%201%200%201%200-1.414%201.414L3.586%2012l-1.293%201.293a1%201%200%201%200%201.414%201.414Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

  trix-toolbar .trix-dialogs {
    position: relative; }

  trix-toolbar .trix-dialog {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    font-size: 0.75em;
    padding: 15px 10px;
    background: #fff;
    box-shadow: 0 0.3em 1em #ccc;
    border-top: 2px solid #888;
    border-radius: 5px;
    z-index: 5; }

  trix-toolbar .trix-input--dialog {
    font-size: inherit;
    font-weight: normal;
    padding: 0.5em 0.8em;
    margin: 0 10px 0 0;
    border-radius: 3px;
    border: 1px solid #bbb;
    background-color: #fff;
    box-shadow: none;
    outline: none;
    -webkit-appearance: none;
    -moz-appearance: none; }
    trix-toolbar .trix-input--dialog.validate:invalid {
      box-shadow: #F00 0px 0px 1.5px 1px; }

  trix-toolbar .trix-button--dialog {
    font-size: inherit;
    padding: 0.5em;
    border-bottom: none; }

  trix-toolbar .trix-dialog--link {
    max-width: 600px; }

  trix-toolbar .trix-dialog__link-fields {
    display: flex;
    align-items: baseline; }
    trix-toolbar .trix-dialog__link-fields .trix-input {
      flex: 1; }
    trix-toolbar .trix-dialog__link-fields .trix-button-group {
      flex: 0 0 content;
      margin: 0; }

  trix-editor [data-trix-mutable]:not(.attachment__caption-editor) {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none; }

  trix-editor [data-trix-mutable]::-moz-selection,
  trix-editor [data-trix-cursor-target]::-moz-selection, trix-editor [data-trix-mutable] ::-moz-selection {
    background: none; }

  trix-editor [data-trix-mutable]::selection,
  trix-editor [data-trix-cursor-target]::selection, trix-editor [data-trix-mutable] ::selection {
    background: none; }

  trix-editor .attachment__caption-editor:focus[data-trix-mutable]::-moz-selection {
    background: highlight; }

  trix-editor .attachment__caption-editor:focus[data-trix-mutable]::selection {
    background: highlight; }

  trix-editor [data-trix-mutable].attachment.attachment--file {
    box-shadow: 0 0 0 2px highlight;
    border-color: transparent; }

  trix-editor [data-trix-mutable].attachment img {
    box-shadow: 0 0 0 2px highlight; }

  trix-editor .attachment {
    position: relative; }
    trix-editor .attachment:hover {
      cursor: default; }

  trix-editor .attachment--preview .attachment__caption:hover {
    cursor: text; }

  trix-editor .attachment__progress {
    position: absolute;
    z-index: 1;
    height: 20px;
    top: calc(50% - 10px);
    left: 5%;
    width: 90%;
    opacity: 0.9;
    transition: opacity 200ms ease-in; }
    trix-editor .attachment__progress[value="100"] {
      opacity: 0; }

  trix-editor .attachment__caption-editor {
    display: inline-block;
    width: 100%;
    margin: 0;
    padding: 0;
    font-size: inherit;
    font-family: inherit;
    line-height: inherit;
    color: inherit;
    text-align: center;
    vertical-align: top;
    border: none;
    outline: none;
    -webkit-appearance: none;
    -moz-appearance: none; }

  trix-editor .attachment__toolbar {
    position: absolute;
    z-index: 1;
    top: -0.9em;
    left: 0;
    width: 100%;
    text-align: center; }

  trix-editor .trix-button-group {
    display: inline-flex; }

  trix-editor .trix-button {
    position: relative;
    float: left;
    color: #666;
    white-space: nowrap;
    font-size: 80%;
    padding: 0 0.8em;
    margin: 0;
    outline: none;
    border: none;
    border-radius: 0;
    background: transparent; }
    trix-editor .trix-button:not(:first-child) {
      border-left: 1px solid #ccc; }
    trix-editor .trix-button.trix-active {
      background: #cbeefa; }
    trix-editor .trix-button:not(:disabled) {
      cursor: pointer; }

  trix-editor .trix-button--remove {
    text-indent: -9999px;
    display: inline-block;
    padding: 0;
    outline: none;
    width: 1.8em;
    height: 1.8em;
    line-height: 1.8em;
    border-radius: 50%;
    background-color: #fff;
    border: 2px solid highlight;
    box-shadow: 1px 1px 6px rgba(0, 0, 0, 0.25); }trix-editor .trix-button.trix-active {
      background: #cbeefa; }
    trix-editor .trix-button--remove::before {
      display: inline-block;
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      opacity: 0.7;
      content: "";
      background-image: url("data:image/svg+xml,%3Csvg%20height%3D%2224%22%20width%3D%2224%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M19%206.41%2017.59%205%2012%2010.59%206.41%205%205%206.41%2010.59%2012%205%2017.59%206.41%2019%2012%2013.41%2017.59%2019%2019%2017.59%2013.41%2012z%22%2F%3E%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%3C%2Fsvg%3E");
      background-position: center;
      background-repeat: no-repeat;
      background-size: 90%; }
    trix-editor .trix-button--remove:hover {
      border-color: #333; }
      trix-editor .trix-button--remove:hover::before {
        opacity: 1; }

  trix-editor .attachment__metadata-container {
    position: relative; }

  trix-editor .attachment__metadata {
    position: absolute;
    left: 50%;
    top: 2em;
    transform: translate(-50%, 0);
    max-width: 90%;
    padding: 0.1em 0.6em;
    font-size: 0.8em;
    color: #fff;
    background-color: rgba(0, 0, 0, 0.7);
    border-radius: 3px; }
    trix-editor .attachment__metadata .attachment__name {
      display: inline-block;
      max-width: 100%;
      vertical-align: bottom;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap; }
    trix-editor .attachment__metadata .attachment__size {
      margin-left: 0.2em;
      white-space: nowrap; }

  .trix-content {
    line-height: 1.5; }
    .trix-content * {
      box-sizing: border-box;
      margin: 0;
      padding: 0; }
    .trix-content h1 {
      font-size: 1.2em;
      line-height: 1.2; }
    .trix-content blockquote {
      border: 0 solid #ccc;
      border-left-width: 0.3em;
      margin-left: 0.3em;
      padding-left: 0.6em; }
    .trix-content [dir=rtl] blockquote,
    .trix-content blockquote[dir=rtl] {
      border-width: 0;
      border-right-width: 0.3em;
      margin-right: 0.3em;
      padding-right: 0.6em; }
    .trix-content li {
      margin-left: 1em; }
    .trix-content [dir=rtl] li {
      margin-right: 1em; }
    .trix-content pre {
      display: inline-block;
      width: 100%;
      vertical-align: top;
      font-family: monospace;
      font-size: 0.9em;
      padding: 0.5em;
      white-space: pre;
      overflow-x: auto; }
    .trix-content img {
      max-width: 100%;
      height: auto; }
    .trix-content .attachment {
      display: inline-block;
      position: relative;
      max-width: 100%; }
      .trix-content .attachment a {
        color: inherit;
        text-decoration: none; }
        .trix-content .attachment a:hover, .trix-content .attachment a:visited:hover {
          color: inherit; }
    .trix-content .attachment__caption {
      text-align: center; }
      .trix-content .attachment__caption .attachment__name + .attachment__size::before {
        content: ' \2022 '; }
    .trix-content .attachment--preview {
      width: 100%;
      text-align: center; }
      .trix-content .attachment--preview .attachment__caption {
        color: #666;
        font-size: 0.9em;
        line-height: 1.2; }
    .trix-content .attachment--file {
      color: #333;
      line-height: 1;
      margin: 0 2px 2px 2px;
      padding: 0.4em 1em;
      border: 1px solid #bbb;
      border-radius: 5px; }
    .trix-content .attachment-gallery {
      display: flex;
      flex-wrap: wrap;
      position: relative; }
      .trix-content .attachment-gallery .attachment {
        flex: 1 0 33%;
        padding: 0 0.5em;
        max-width: 33%; }
      .trix-content .attachment-gallery.attachment-gallery--2 .attachment, .trix-content .attachment-gallery.attachment-gallery--4 .attachment {
        flex-basis: 50%;
        max-width: 50%; }

@media (prefers-color-scheme: dark) {
    .trix-button-row {
        .trix-button-group {
            .trix-button {
                border: 0;
                background: transparent;
                filter: invert(100%);
            }
        }
    }
}
</style>
@else
<style {{ $attributes }}>
trix-editor {
  border: 1px solid #bbb;
  border-radius: 3px;
  margin: 0;
  padding: 0.4em 0.6em;
  min-height: 5em;
  outline: none; }

trix-toolbar * {
  box-sizing: border-box; }

trix-toolbar .trix-button-row {
  display: flex;
  flex-wrap: nowrap;
  justify-content: space-between;
  overflow-x: auto; }

trix-toolbar .trix-button-group {
  display: flex;
  margin-bottom: 10px;
  border: 1px solid #bbb;
  border-top-color: #ccc;
  border-bottom-color: #888;
  border-radius: 3px; }
  trix-toolbar .trix-button-group:not(:first-child) {
    margin-left: 1.5vw; }
    @media (max-width: 768px) {
      trix-toolbar .trix-button-group:not(:first-child) {
        margin-left: 0; } }

trix-toolbar .trix-button-group-spacer {
  flex-grow: 1; }
  @media (max-width: 768px) {
    trix-toolbar .trix-button-group-spacer {
      display: none; } }

trix-toolbar .trix-button {
  position: relative;
  float: left;
  color: rgba(0, 0, 0, 0.6);
  font-size: 0.75em;
  font-weight: 600;
  white-space: nowrap;
  padding: 0 0.5em;
  margin: 0;
  outline: none;
  border: none;
  border-bottom: 1px solid #ddd;
  border-radius: 0;
  background: transparent; }
  trix-toolbar .trix-button:not(:first-child) {
    border-left: 1px solid #ccc; }
  trix-toolbar .trix-button.trix-active {
    background: #cbeefa;
    color: black; }
  trix-toolbar .trix-button:not(:disabled) {
    cursor: pointer; }
  trix-toolbar .trix-button:disabled {
    color: rgba(0, 0, 0, 0.125); }
  @media (max-width: 768px) {
    trix-toolbar .trix-button {
      letter-spacing: -0.01em;
      padding: 0 0.3em; } }

trix-toolbar .trix-button--icon {
  font-size: inherit;
  width: 2.6em;
  height: 1.6em;
  max-width: calc(0.8em + 4vw);
  text-indent: -9999px; }
  @media (max-width: 768px) {
    trix-toolbar .trix-button--icon {
      height: 2em;
      max-width: calc(0.8em + 3.5vw); } }
  trix-toolbar .trix-button--icon::before {
    display: inline-block;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 0.6;
    content: "";
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain; }
    @media (max-width: 768px) {
      trix-toolbar .trix-button--icon::before {
        right: 6%;
        left: 6%; } }
  trix-toolbar .trix-button--icon.trix-active::before {
    opacity: 1; }
  trix-toolbar .trix-button--icon:disabled::before {
    opacity: 0.125; }

trix-toolbar .trix-button--icon-attach::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M10.5%2018V7.5c0-2.25%203-2.25%203%200V18c0%204.125-6%204.125-6%200V7.5c0-6.375%209-6.375%209%200V18%22%20stroke%3D%22%23000%22%20stroke-width%3D%222%22%20stroke-miterlimit%3D%2210%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%2F%3E%3C%2Fsvg%3E");
  top: 8%;
  bottom: 4%; }

trix-toolbar .trix-button--icon-bold::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M6.522%2019.242a.5.5%200%200%201-.5-.5V5.35a.5.5%200%200%201%20.5-.5h5.783c1.347%200%202.46.345%203.24.982.783.64%201.216%201.562%201.216%202.683%200%201.13-.587%202.129-1.476%202.71a.35.35%200%200%200%20.049.613c1.259.56%202.101%201.742%202.101%203.22%200%201.282-.483%202.334-1.363%203.063-.876.726-2.132%201.12-3.66%201.12h-5.89ZM9.27%207.347v3.362h1.97c.766%200%201.347-.17%201.733-.464.38-.291.587-.716.587-1.27%200-.53-.183-.928-.513-1.198-.334-.273-.838-.43-1.505-.43H9.27Zm0%205.606v3.791h2.389c.832%200%201.448-.177%201.853-.497.399-.315.614-.786.614-1.423%200-.62-.22-1.077-.63-1.385-.418-.313-1.053-.486-1.905-.486H9.27Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-italic::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M9%205h6.5v2h-2.23l-2.31%2010H13v2H6v-2h2.461l2.306-10H9V5Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-link::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M18.948%205.258a4.337%204.337%200%200%200-6.108%200L11.217%206.87a.993.993%200%200%200%200%201.41c.392.39%201.027.39%201.418%200l1.623-1.613a2.323%202.323%200%200%201%203.271%200%202.29%202.29%200%200%201%200%203.251l-2.393%202.38a3.021%203.021%200%200%201-4.255%200l-.05-.049a1.007%201.007%200%200%200-1.418%200%20.993.993%200%200%200%200%201.41l.05.049a5.036%205.036%200%200%200%207.091%200l2.394-2.38a4.275%204.275%200%200%200%200-6.072Zm-13.683%2013.6a4.337%204.337%200%200%200%206.108%200l1.262-1.255a.993.993%200%200%200%200-1.41%201.007%201.007%200%200%200-1.418%200L9.954%2017.45a2.323%202.323%200%200%201-3.27%200%202.29%202.29%200%200%201%200-3.251l2.344-2.331a2.579%202.579%200%200%201%203.631%200c.392.39%201.027.39%201.419%200a.993.993%200%200%200%200-1.41%204.593%204.593%200%200%200-6.468%200l-2.345%202.33a4.275%204.275%200%200%200%200%206.072Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-strike::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M6%2014.986c.088%202.647%202.246%204.258%205.635%204.258%203.496%200%205.713-1.728%205.713-4.463%200-.275-.02-.536-.062-.781h-3.461c.398.293.573.654.573%201.123%200%201.035-1.074%201.787-2.646%201.787-1.563%200-2.773-.762-2.91-1.924H6ZM6.432%2010h3.763c-.632-.314-.914-.715-.914-1.273%200-1.045.977-1.739%202.432-1.739%201.475%200%202.52.723%202.617%201.914h2.764c-.05-2.548-2.11-4.238-5.39-4.238-3.145%200-5.392%201.719-5.392%204.316%200%20.363.04.703.12%201.02ZM4%2011a1%201%200%201%200%200%202h15a1%201%200%201%200%200-2H4Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-quote::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M4.581%208.471c.44-.5%201.056-.834%201.758-.995C8.074%207.17%209.201%207.822%2010%208.752c1.354%201.578%201.33%203.555.394%205.277-.941%201.731-2.788%203.163-4.988%203.56a.622.622%200%200%201-.653-.317c-.113-.205-.121-.49.16-.764.294-.286.567-.566.791-.835.222-.266.413-.54.524-.815.113-.28.156-.597.026-.908-.128-.303-.39-.524-.72-.69a3.02%203.02%200%200%201-1.674-2.7c0-.905.283-1.59.72-2.088Zm9.419%200c.44-.5%201.055-.834%201.758-.995%201.734-.306%202.862.346%203.66%201.276%201.355%201.578%201.33%203.555.395%205.277-.941%201.731-2.789%203.163-4.988%203.56a.622.622%200%200%201-.653-.317c-.113-.205-.122-.49.16-.764.294-.286.567-.566.791-.835.222-.266.412-.54.523-.815.114-.28.157-.597.026-.908-.127-.303-.39-.524-.72-.69a3.02%203.02%200%200%201-1.672-2.701c0-.905.283-1.59.72-2.088Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-heading-1::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M21.5%207.5v-3h-12v3H14v13h3v-13h4.5ZM9%2013.5h3.5v-3h-10v3H6v7h3v-7Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-code::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M3.293%2011.293a1%201%200%200%200%200%201.414l4%204a1%201%200%201%200%201.414-1.414L5.414%2012l3.293-3.293a1%201%200%200%200-1.414-1.414l-4%204Zm13.414%205.414%204-4a1%201%200%200%200%200-1.414l-4-4a1%201%200%201%200-1.414%201.414L18.586%2012l-3.293%203.293a1%201%200%200%200%201.414%201.414Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-bullet-list::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M5%207.5a1.5%201.5%200%201%200%200-3%201.5%201.5%200%200%200%200%203ZM8%206a1%201%200%200%201%201-1h11a1%201%200%201%201%200%202H9a1%201%200%200%201-1-1Zm1%205a1%201%200%201%200%200%202h11a1%201%200%201%200%200-2H9Zm0%206a1%201%200%201%200%200%202h11a1%201%200%201%200%200-2H9Zm-2.5-5a1.5%201.5%200%201%201-3%200%201.5%201.5%200%200%201%203%200ZM5%2019.5a1.5%201.5%200%201%200%200-3%201.5%201.5%200%200%200%200%203Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-number-list::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M3%204h2v4H4V5H3V4Zm5%202a1%201%200%200%201%201-1h11a1%201%200%201%201%200%202H9a1%201%200%200%201-1-1Zm1%205a1%201%200%201%200%200%202h11a1%201%200%201%200%200-2H9Zm0%206a1%201%200%201%200%200%202h11a1%201%200%201%200%200-2H9Zm-3.5-7H6v1l-1.5%202H6v1H3v-1l1.667-2H3v-1h2.5ZM3%2017v-1h3v4H3v-1h2v-.5H4v-1h1V17H3Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-undo::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M3%2014a1%201%200%200%200%201%201h6a1%201%200%201%200%200-2H6.257c2.247-2.764%205.151-3.668%207.579-3.264%202.589.432%204.739%202.356%205.174%205.405a1%201%200%200%200%201.98-.283c-.564-3.95-3.415-6.526-6.825-7.095C11.084%207.25%207.63%208.377%205%2011.39V8a1%201%200%200%200-2%200v6Zm2-1Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-redo::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M21%2014a1%201%200%200%201-1%201h-6a1%201%200%201%201%200-2h3.743c-2.247-2.764-5.151-3.668-7.579-3.264-2.589.432-4.739%202.356-5.174%205.405a1%201%200%200%201-1.98-.283c.564-3.95%203.415-6.526%206.826-7.095%203.08-.513%206.534.614%209.164%203.626V8a1%201%200%201%201%202%200v6Zm-2-1Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-decrease-nesting-level::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M5%206a1%201%200%200%201%201-1h12a1%201%200%201%201%200%202H6a1%201%200%200%201-1-1Zm4%205a1%201%200%201%200%200%202h9a1%201%200%201%200%200-2H9Zm-3%206a1%201%200%201%200%200%202h12a1%201%200%201%200%200-2H6Zm-3.707-5.707a1%201%200%200%200%200%201.414l2%202a1%201%200%201%200%201.414-1.414L4.414%2012l1.293-1.293a1%201%200%200%200-1.414-1.414l-2%202Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-increase-nesting-level::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M5%206a1%201%200%200%201%201-1h12a1%201%200%201%201%200%202H6a1%201%200%200%201-1-1Zm4%205a1%201%200%201%200%200%202h9a1%201%200%201%200%200-2H9Zm-3%206a1%201%200%201%200%200%202h12a1%201%200%201%200%200-2H6Zm-2.293-2.293%202-2a1%201%200%200%200%200-1.414l-2-2a1%201%200%201%200-1.414%201.414L3.586%2012l-1.293%201.293a1%201%200%201%200%201.414%201.414Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-dialogs {
  position: relative; }

trix-toolbar .trix-dialog {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  font-size: 0.75em;
  padding: 15px 10px;
  background: #fff;
  box-shadow: 0 0.3em 1em #ccc;
  border-top: 2px solid #888;
  border-radius: 5px;
  z-index: 5; }

trix-toolbar .trix-input--dialog {
  font-size: inherit;
  font-weight: normal;
  padding: 0.5em 0.8em;
  margin: 0 10px 0 0;
  border-radius: 3px;
  border: 1px solid #bbb;
  background-color: #fff;
  box-shadow: none;
  outline: none;
  -webkit-appearance: none;
  -moz-appearance: none; }
  trix-toolbar .trix-input--dialog.validate:invalid {
    box-shadow: #F00 0px 0px 1.5px 1px; }

trix-toolbar .trix-button--dialog {
  font-size: inherit;
  padding: 0.5em;
  border-bottom: none; }

trix-toolbar .trix-dialog--link {
  max-width: 600px; }

trix-toolbar .trix-dialog__link-fields {
  display: flex;
  align-items: baseline; }
  trix-toolbar .trix-dialog__link-fields .trix-input {
    flex: 1; }
  trix-toolbar .trix-dialog__link-fields .trix-button-group {
    flex: 0 0 content;
    margin: 0; }

trix-editor [data-trix-mutable]:not(.attachment__caption-editor) {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none; }

trix-editor [data-trix-mutable]::-moz-selection,
trix-editor [data-trix-cursor-target]::-moz-selection, trix-editor [data-trix-mutable] ::-moz-selection {
  background: none; }

trix-editor [data-trix-mutable]::selection,
trix-editor [data-trix-cursor-target]::selection, trix-editor [data-trix-mutable] ::selection {
  background: none; }

trix-editor .attachment__caption-editor:focus[data-trix-mutable]::-moz-selection {
  background: highlight; }

trix-editor .attachment__caption-editor:focus[data-trix-mutable]::selection {
  background: highlight; }

trix-editor [data-trix-mutable].attachment.attachment--file {
  box-shadow: 0 0 0 2px highlight;
  border-color: transparent; }

trix-editor [data-trix-mutable].attachment img {
  box-shadow: 0 0 0 2px highlight; }

trix-editor .attachment {
  position: relative; }
  trix-editor .attachment:hover {
    cursor: default; }

trix-editor .attachment--preview .attachment__caption:hover {
  cursor: text; }

trix-editor .attachment__progress {
  position: absolute;
  z-index: 1;
  height: 20px;
  top: calc(50% - 10px);
  left: 5%;
  width: 90%;
  opacity: 0.9;
  transition: opacity 200ms ease-in; }
  trix-editor .attachment__progress[value="100"] {
    opacity: 0; }

trix-editor .attachment__caption-editor {
  display: inline-block;
  width: 100%;
  margin: 0;
  padding: 0;
  font-size: inherit;
  font-family: inherit;
  line-height: inherit;
  color: inherit;
  text-align: center;
  vertical-align: top;
  border: none;
  outline: none;
  -webkit-appearance: none;
  -moz-appearance: none; }

trix-editor .attachment__toolbar {
  position: absolute;
  z-index: 1;
  top: -0.9em;
  left: 0;
  width: 100%;
  text-align: center; }

trix-editor .trix-button-group {
  display: inline-flex; }

trix-editor .trix-button {
  position: relative;
  float: left;
  color: #666;
  white-space: nowrap;
  font-size: 80%;
  padding: 0 0.8em;
  margin: 0;
  outline: none;
  border: none;
  border-radius: 0;
  background: transparent; }
  trix-editor .trix-button:not(:first-child) {
    border-left: 1px solid #ccc; }
  trix-editor .trix-button.trix-active {
    background: #cbeefa; }
  trix-editor .trix-button:not(:disabled) {
    cursor: pointer; }

trix-editor .trix-button--remove {
  text-indent: -9999px;
  display: inline-block;
  padding: 0;
  outline: none;
  width: 1.8em;
  height: 1.8em;
  line-height: 1.8em;
  border-radius: 50%;
  background-color: #fff;
  border: 2px solid highlight;
  box-shadow: 1px 1px 6px rgba(0, 0, 0, 0.25); }
  trix-editor .trix-button--remove::before {
    display: inline-block;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 0.7;
    content: "";
    background-image: url("data:image/svg+xml,%3Csvg%20height%3D%2224%22%20width%3D%2224%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M19%206.41%2017.59%205%2012%2010.59%206.41%205%205%206.41%2010.59%2012%205%2017.59%206.41%2019%2012%2013.41%2017.59%2019%2019%2017.59%2013.41%2012z%22%2F%3E%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%3C%2Fsvg%3E");
    background-position: center;
    background-repeat: no-repeat;
    background-size: 90%; }
  trix-editor .trix-button--remove:hover {
    border-color: #333; }
    trix-editor .trix-button--remove:hover::before {
      opacity: 1; }

trix-editor .attachment__metadata-container {
  position: relative; }

trix-editor .attachment__metadata {
  position: absolute;
  left: 50%;
  top: 2em;
  transform: translate(-50%, 0);
  max-width: 90%;
  padding: 0.1em 0.6em;
  font-size: 0.8em;
  color: #fff;
  background-color: rgba(0, 0, 0, 0.7);
  border-radius: 3px; }
  trix-editor .attachment__metadata .attachment__name {
    display: inline-block;
    max-width: 100%;
    vertical-align: bottom;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap; }
  trix-editor .attachment__metadata .attachment__size {
    margin-left: 0.2em;
    white-space: nowrap; }

.trix-content {
  line-height: 1.5; }
  .trix-content * {
    box-sizing: border-box;
    margin: 0;
    padding: 0; }
  .trix-content h1 {
    font-size: 1.2em;
    line-height: 1.2; }
  .trix-content blockquote {
    border: 0 solid #ccc;
    border-left-width: 0.3em;
    margin-left: 0.3em;
    padding-left: 0.6em; }
  .trix-content [dir=rtl] blockquote,
  .trix-content blockquote[dir=rtl] {
    border-width: 0;
    border-right-width: 0.3em;
    margin-right: 0.3em;
    padding-right: 0.6em; }
  .trix-content li {
    margin-left: 1em; }
  .trix-content [dir=rtl] li {
    margin-right: 1em; }
  .trix-content pre {
    display: inline-block;
    width: 100%;
    vertical-align: top;
    font-family: monospace;
    font-size: 0.9em;
    padding: 0.5em;
    white-space: pre;
    background-color: #eee;
    overflow-x: auto; }
  .trix-content img {
    max-width: 100%;
    height: auto; }
  .trix-content .attachment {
    display: inline-block;
    position: relative;
    max-width: 100%; }
    .trix-content .attachment a {
      color: inherit;
      text-decoration: none; }
      .trix-content .attachment a:hover, .trix-content .attachment a:visited:hover {
        color: inherit; }
  .trix-content .attachment__caption {
    text-align: center; }
    .trix-content .attachment__caption .attachment__name + .attachment__size::before {
      content: ' \2022 '; }
  .trix-content .attachment--preview {
    width: 100%;
    text-align: center; }
    .trix-content .attachment--preview .attachment__caption {
      color: #666;
      font-size: 0.9em;
      line-height: 1.2; }
  .trix-content .attachment--file {
    color: #333;
    line-height: 1;
    margin: 0 2px 2px 2px;
    padding: 0.4em 1em;
    border: 1px solid #bbb;
    border-radius: 5px; }trix-editor {
  border: 1px solid #bbb;
  border-radius: 3px;
  margin: 0;
  padding: 0.4em 0.6em;
  min-height: 5em;
  outline: none; }

trix-toolbar * {
  box-sizing: border-box; }

trix-toolbar .trix-button-row {
  display: flex;
  flex-wrap: nowrap;
  justify-content: space-between;
  overflow-x: auto; }

trix-toolbar .trix-button-group {
  display: flex;
  margin-bottom: 10px;
  border: 1px solid #bbb;
  border-top-color: #ccc;
  border-bottom-color: #888;
  border-radius: 3px; }
  trix-toolbar .trix-button-group:not(:first-child) {
    margin-left: 1.5vw; }
    @media (max-width: 768px) {
      trix-toolbar .trix-button-group:not(:first-child) {
        margin-left: 0; } }

trix-toolbar .trix-button-group-spacer {
  flex-grow: 1; }
  @media (max-width: 768px) {
    trix-toolbar .trix-button-group-spacer {
      display: none; } }

trix-toolbar .trix-button {
  position: relative;
  float: left;
  color: rgba(0, 0, 0, 0.6);
  font-size: 0.75em;
  font-weight: 600;
  white-space: nowrap;
  padding: 0 0.5em;
  margin: 0;
  outline: none;
  border: none;
  border-bottom: 1px solid #ddd;
  border-radius: 0;
  background: transparent; }
  trix-toolbar .trix-button:not(:first-child) {
    border-left: 1px solid #ccc; }
  trix-toolbar .trix-button.trix-active {
    background: #cbeefa;
    color: black; }
  trix-toolbar .trix-button:not(:disabled) {
    cursor: pointer; }
  trix-toolbar .trix-button:disabled {
    color: rgba(0, 0, 0, 0.125); }
  @media (max-width: 768px) {
    trix-toolbar .trix-button {
      letter-spacing: -0.01em;
      padding: 0 0.3em; } }

trix-toolbar .trix-button--icon {
  font-size: inherit;
  width: 2.6em;
  height: 1.6em;
  max-width: calc(0.8em + 4vw);
  text-indent: -9999px; }
  @media (max-width: 768px) {
    trix-toolbar .trix-button--icon {
      height: 2em;
      max-width: calc(0.8em + 3.5vw); } }
  trix-toolbar .trix-button--icon::before {
    display: inline-block;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 0.6;
    content: "";
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain; }
    @media (max-width: 768px) {
      trix-toolbar .trix-button--icon::before {
        right: 6%;
        left: 6%; } }
  trix-toolbar .trix-button--icon.trix-active::before {
    opacity: 1; }
  trix-toolbar .trix-button--icon:disabled::before {
    opacity: 0.125; }

trix-toolbar .trix-button--icon-attach::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M10.5%2018V7.5c0-2.25%203-2.25%203%200V18c0%204.125-6%204.125-6%200V7.5c0-6.375%209-6.375%209%200V18%22%20stroke%3D%22%23000%22%20stroke-width%3D%222%22%20stroke-miterlimit%3D%2210%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%2F%3E%3C%2Fsvg%3E");
  top: 8%;
  bottom: 4%; }

trix-toolbar .trix-button--icon-bold::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M6.522%2019.242a.5.5%200%200%201-.5-.5V5.35a.5.5%200%200%201%20.5-.5h5.783c1.347%200%202.46.345%203.24.982.783.64%201.216%201.562%201.216%202.683%200%201.13-.587%202.129-1.476%202.71a.35.35%200%200%200%20.049.613c1.259.56%202.101%201.742%202.101%203.22%200%201.282-.483%202.334-1.363%203.063-.876.726-2.132%201.12-3.66%201.12h-5.89ZM9.27%207.347v3.362h1.97c.766%200%201.347-.17%201.733-.464.38-.291.587-.716.587-1.27%200-.53-.183-.928-.513-1.198-.334-.273-.838-.43-1.505-.43H9.27Zm0%205.606v3.791h2.389c.832%200%201.448-.177%201.853-.497.399-.315.614-.786.614-1.423%200-.62-.22-1.077-.63-1.385-.418-.313-1.053-.486-1.905-.486H9.27Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-italic::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M9%205h6.5v2h-2.23l-2.31%2010H13v2H6v-2h2.461l2.306-10H9V5Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-link::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M18.948%205.258a4.337%204.337%200%200%200-6.108%200L11.217%206.87a.993.993%200%200%200%200%201.41c.392.39%201.027.39%201.418%200l1.623-1.613a2.323%202.323%200%200%201%203.271%200%202.29%202.29%200%200%201%200%203.251l-2.393%202.38a3.021%203.021%200%200%201-4.255%200l-.05-.049a1.007%201.007%200%200%200-1.418%200%20.993.993%200%200%200%200%201.41l.05.049a5.036%205.036%200%200%200%207.091%200l2.394-2.38a4.275%204.275%200%200%200%200-6.072Zm-13.683%2013.6a4.337%204.337%200%200%200%206.108%200l1.262-1.255a.993.993%200%200%200%200-1.41%201.007%201.007%200%200%200-1.418%200L9.954%2017.45a2.323%202.323%200%200%201-3.27%200%202.29%202.29%200%200%201%200-3.251l2.344-2.331a2.579%202.579%200%200%201%203.631%200c.392.39%201.027.39%201.419%200a.993.993%200%200%200%200-1.41%204.593%204.593%200%200%200-6.468%200l-2.345%202.33a4.275%204.275%200%200%200%200%206.072Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-strike::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M6%2014.986c.088%202.647%202.246%204.258%205.635%204.258%203.496%200%205.713-1.728%205.713-4.463%200-.275-.02-.536-.062-.781h-3.461c.398.293.573.654.573%201.123%200%201.035-1.074%201.787-2.646%201.787-1.563%200-2.773-.762-2.91-1.924H6ZM6.432%2010h3.763c-.632-.314-.914-.715-.914-1.273%200-1.045.977-1.739%202.432-1.739%201.475%200%202.52.723%202.617%201.914h2.764c-.05-2.548-2.11-4.238-5.39-4.238-3.145%200-5.392%201.719-5.392%204.316%200%20.363.04.703.12%201.02ZM4%2011a1%201%200%201%200%200%202h15a1%201%200%201%200%200-2H4Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-quote::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M4.581%208.471c.44-.5%201.056-.834%201.758-.995C8.074%207.17%209.201%207.822%2010%208.752c1.354%201.578%201.33%203.555.394%205.277-.941%201.731-2.788%203.163-4.988%203.56a.622.622%200%200%201-.653-.317c-.113-.205-.121-.49.16-.764.294-.286.567-.566.791-.835.222-.266.413-.54.524-.815.113-.28.156-.597.026-.908-.128-.303-.39-.524-.72-.69a3.02%203.02%200%200%201-1.674-2.7c0-.905.283-1.59.72-2.088Zm9.419%200c.44-.5%201.055-.834%201.758-.995%201.734-.306%202.862.346%203.66%201.276%201.355%201.578%201.33%203.555.395%205.277-.941%201.731-2.789%203.163-4.988%203.56a.622.622%200%200%201-.653-.317c-.113-.205-.122-.49.16-.764.294-.286.567-.566.791-.835.222-.266.412-.54.523-.815.114-.28.157-.597.026-.908-.127-.303-.39-.524-.72-.69a3.02%203.02%200%200%201-1.672-2.701c0-.905.283-1.59.72-2.088Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-heading-1::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M21.5%207.5v-3h-12v3H14v13h3v-13h4.5ZM9%2013.5h3.5v-3h-10v3H6v7h3v-7Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-code::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M3.293%2011.293a1%201%200%200%200%200%201.414l4%204a1%201%200%201%200%201.414-1.414L5.414%2012l3.293-3.293a1%201%200%200%200-1.414-1.414l-4%204Zm13.414%205.414%204-4a1%201%200%200%200%200-1.414l-4-4a1%201%200%201%200-1.414%201.414L18.586%2012l-3.293%203.293a1%201%200%200%200%201.414%201.414Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-bullet-list::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M5%207.5a1.5%201.5%200%201%200%200-3%201.5%201.5%200%200%200%200%203ZM8%206a1%201%200%200%201%201-1h11a1%201%200%201%201%200%202H9a1%201%200%200%201-1-1Zm1%205a1%201%200%201%200%200%202h11a1%201%200%201%200%200-2H9Zm0%206a1%201%200%201%200%200%202h11a1%201%200%201%200%200-2H9Zm-2.5-5a1.5%201.5%200%201%201-3%200%201.5%201.5%200%200%201%203%200ZM5%2019.5a1.5%201.5%200%201%200%200-3%201.5%201.5%200%200%200%200%203Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-number-list::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M3%204h2v4H4V5H3V4Zm5%202a1%201%200%200%201%201-1h11a1%201%200%201%201%200%202H9a1%201%200%200%201-1-1Zm1%205a1%201%200%201%200%200%202h11a1%201%200%201%200%200-2H9Zm0%206a1%201%200%201%200%200%202h11a1%201%200%201%200%200-2H9Zm-3.5-7H6v1l-1.5%202H6v1H3v-1l1.667-2H3v-1h2.5ZM3%2017v-1h3v4H3v-1h2v-.5H4v-1h1V17H3Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-undo::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M3%2014a1%201%200%200%200%201%201h6a1%201%200%201%200%200-2H6.257c2.247-2.764%205.151-3.668%207.579-3.264%202.589.432%204.739%202.356%205.174%205.405a1%201%200%200%200%201.98-.283c-.564-3.95-3.415-6.526-6.825-7.095C11.084%207.25%207.63%208.377%205%2011.39V8a1%201%200%200%200-2%200v6Zm2-1Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-redo::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M21%2014a1%201%200%200%201-1%201h-6a1%201%200%201%201%200-2h3.743c-2.247-2.764-5.151-3.668-7.579-3.264-2.589.432-4.739%202.356-5.174%205.405a1%201%200%200%201-1.98-.283c.564-3.95%203.415-6.526%206.826-7.095%203.08-.513%206.534.614%209.164%203.626V8a1%201%200%201%201%202%200v6Zm-2-1Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-decrease-nesting-level::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M5%206a1%201%200%200%201%201-1h12a1%201%200%201%201%200%202H6a1%201%200%200%201-1-1Zm4%205a1%201%200%201%200%200%202h9a1%201%200%201%200%200-2H9Zm-3%206a1%201%200%201%200%200%202h12a1%201%200%201%200%200-2H6Zm-3.707-5.707a1%201%200%200%200%200%201.414l2%202a1%201%200%201%200%201.414-1.414L4.414%2012l1.293-1.293a1%201%200%200%200-1.414-1.414l-2%202Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-button--icon-increase-nesting-level::before {
  background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M5%206a1%201%200%200%201%201-1h12a1%201%200%201%201%200%202H6a1%201%200%200%201-1-1Zm4%205a1%201%200%201%200%200%202h9a1%201%200%201%200%200-2H9Zm-3%206a1%201%200%201%200%200%202h12a1%201%200%201%200%200-2H6Zm-2.293-2.293%202-2a1%201%200%200%200%200-1.414l-2-2a1%201%200%201%200-1.414%201.414L3.586%2012l-1.293%201.293a1%201%200%201%200%201.414%201.414Z%22%20fill%3D%22%23000%22%2F%3E%3C%2Fsvg%3E"); }

trix-toolbar .trix-dialogs {
  position: relative; }

trix-toolbar .trix-dialog {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  font-size: 0.75em;
  padding: 15px 10px;
  background: #fff;
  box-shadow: 0 0.3em 1em #ccc;
  border-top: 2px solid #888;
  border-radius: 5px;
  z-index: 5; }

trix-toolbar .trix-input--dialog {
  font-size: inherit;
  font-weight: normal;
  padding: 0.5em 0.8em;
  margin: 0 10px 0 0;
  border-radius: 3px;
  border: 1px solid #bbb;
  background-color: #fff;
  box-shadow: none;
  outline: none;
  -webkit-appearance: none;
  -moz-appearance: none; }
  trix-toolbar .trix-input--dialog.validate:invalid {
    box-shadow: #F00 0px 0px 1.5px 1px; }

trix-toolbar .trix-button--dialog {
  font-size: inherit;
  padding: 0.5em;
  border-bottom: none; }

trix-toolbar .trix-dialog--link {
  max-width: 600px; }

trix-toolbar .trix-dialog__link-fields {
  display: flex;
  align-items: baseline; }
  trix-toolbar .trix-dialog__link-fields .trix-input {
    flex: 1; }
  trix-toolbar .trix-dialog__link-fields .trix-button-group {
    flex: 0 0 content;
    margin: 0; }

trix-editor [data-trix-mutable]:not(.attachment__caption-editor) {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none; }

trix-editor [data-trix-mutable]::-moz-selection,
trix-editor [data-trix-cursor-target]::-moz-selection, trix-editor [data-trix-mutable] ::-moz-selection {
  background: none; }

trix-editor [data-trix-mutable]::selection,
trix-editor [data-trix-cursor-target]::selection, trix-editor [data-trix-mutable] ::selection {
  background: none; }

trix-editor .attachment__caption-editor:focus[data-trix-mutable]::-moz-selection {
  background: highlight; }

trix-editor .attachment__caption-editor:focus[data-trix-mutable]::selection {
  background: highlight; }

trix-editor [data-trix-mutable].attachment.attachment--file {
  box-shadow: 0 0 0 2px highlight;
  border-color: transparent; }

trix-editor [data-trix-mutable].attachment img {
  box-shadow: 0 0 0 2px highlight; }

trix-editor .attachment {
  position: relative; }
  trix-editor .attachment:hover {
    cursor: default; }

trix-editor .attachment--preview .attachment__caption:hover {
  cursor: text; }

trix-editor .attachment__progress {
  position: absolute;
  z-index: 1;
  height: 20px;
  top: calc(50% - 10px);
  left: 5%;
  width: 90%;
  opacity: 0.9;
  transition: opacity 200ms ease-in; }
  trix-editor .attachment__progress[value="100"] {
    opacity: 0; }

trix-editor .attachment__caption-editor {
  display: inline-block;
  width: 100%;
  margin: 0;
  padding: 0;
  font-size: inherit;
  font-family: inherit;
  line-height: inherit;
  color: inherit;
  text-align: center;
  vertical-align: top;
  border: none;
  outline: none;
  -webkit-appearance: none;
  -moz-appearance: none; }

trix-editor .attachment__toolbar {
  position: absolute;
  z-index: 1;
  top: -0.9em;
  left: 0;
  width: 100%;
  text-align: center; }

trix-editor .trix-button-group {
  display: inline-flex; }

trix-editor .trix-button {
  position: relative;
  float: left;
  color: #666;
  white-space: nowrap;
  font-size: 80%;
  padding: 0 0.8em;
  margin: 0;
  outline: none;
  border: none;
  border-radius: 0;
  background: transparent; }
  trix-editor .trix-button:not(:first-child) {
    border-left: 1px solid #ccc; }
  trix-editor .trix-button.trix-active {
    background: #cbeefa; }
  trix-editor .trix-button:not(:disabled) {
    cursor: pointer; }

trix-editor .trix-button--remove {
  text-indent: -9999px;
  display: inline-block;
  padding: 0;
  outline: none;
  width: 1.8em;
  height: 1.8em;
  line-height: 1.8em;
  border-radius: 50%;
  background-color: #fff;
  border: 2px solid highlight;
  box-shadow: 1px 1px 6px rgba(0, 0, 0, 0.25); }
  trix-editor .trix-button--remove::before {
    display: inline-block;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 0.7;
    content: "";
    background-image: url("data:image/svg+xml,%3Csvg%20height%3D%2224%22%20width%3D%2224%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M19%206.41%2017.59%205%2012%2010.59%206.41%205%205%206.41%2010.59%2012%205%2017.59%206.41%2019%2012%2013.41%2017.59%2019%2019%2017.59%2013.41%2012z%22%2F%3E%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%3C%2Fsvg%3E");
    background-position: center;
    background-repeat: no-repeat;
    background-size: 90%; }
  trix-editor .trix-button--remove:hover {
    border-color: #333; }
    trix-editor .trix-button--remove:hover::before {
      opacity: 1; }

trix-editor .attachment__metadata-container {
  position: relative; }

trix-editor .attachment__metadata {
  position: absolute;
  left: 50%;
  top: 2em;
  transform: translate(-50%, 0);
  max-width: 90%;
  padding: 0.1em 0.6em;
  font-size: 0.8em;
  color: #fff;
  background-color: rgba(0, 0, 0, 0.7);
  border-radius: 3px; }
  trix-editor .attachment__metadata .attachment__name {
    display: inline-block;
    max-width: 100%;
    vertical-align: bottom;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap; }
  trix-editor .attachment__metadata .attachment__size {
    margin-left: 0.2em;
    white-space: nowrap; }

.trix-content {
  line-height: 1.5; }
  .trix-content * {
    box-sizing: border-box;
    margin: 0;
    padding: 0; }
  .trix-content h1 {
    font-size: 1.2em;
    line-height: 1.2; }
  .trix-content blockquote {
    border: 0 solid #ccc;
    border-left-width: 0.3em;
    margin-left: 0.3em;
    padding-left: 0.6em; }
  .trix-content [dir=rtl] blockquote,
  .trix-content blockquote[dir=rtl] {
    border-width: 0;
    border-right-width: 0.3em;
    margin-right: 0.3em;
    padding-right: 0.6em; }
  .trix-content li {
    margin-left: 1em; }
  .trix-content [dir=rtl] li {
    margin-right: 1em; }
  .trix-content pre {
    display: inline-block;
    width: 100%;
    vertical-align: top;
    font-family: monospace;
    font-size: 0.9em;
    padding: 0.5em;
    white-space: pre;
    background-color: #eee;
    overflow-x: auto; }
  .trix-content img {
    max-width: 100%;
    height: auto; }
  .trix-content .attachment {
    display: inline-block;
    position: relative;
    max-width: 100%; }
    .trix-content .attachment a {
      color: inherit;
      text-decoration: none; }
      .trix-content .attachment a:hover, .trix-content .attachment a:visited:hover {
        color: inherit; }
  .trix-content .attachment__caption {
    text-align: center; }
    .trix-content .attachment__caption .attachment__name + .attachment__size::before {
      content: ' \2022 '; }
  .trix-content .attachment--preview {
    width: 100%;
    text-align: center; }
    .trix-content .attachment--preview .attachment__caption {
      color: #666;
      font-size: 0.9em;
      line-height: 1.2; }
  .trix-content .attachment--file {
    color: #333;
    line-height: 1;
    margin: 0 2px 2px 2px;
    padding: 0.4em 1em;
    border: 1px solid #bbb;
    border-radius: 5px; }
  .trix-content .attachment-gallery {
    display: flex;
    flex-wrap: wrap;
    position: relative; }
    .trix-content .attachment-gallery .attachment {
      flex: 1 0 33%;
      padding: 0 0.5em;
      max-width: 33%; }
    .trix-content .attachment-gallery.attachment-gallery--2 .attachment, .trix-content .attachment-gallery.attachment-gallery--4 .attachment {
      flex-basis: 50%;
      max-width: 50%; }
  .trix-content .attachment-gallery {
    display: flex;
    flex-wrap: wrap;
    position: relative; }
    .trix-content .attachment-gallery .attachment {
      flex: 1 0 33%;
      padding: 0 0.5em;
      max-width: 33%; }
    .trix-content .attachment-gallery.attachment-gallery--2 .attachment, .trix-content .attachment-gallery.attachment-gallery--4 .attachment {
      flex-basis: 50%;
      max-width: 50%; }
</style>
@endif
