<!DOCTYPE html>
<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title>Snackbar</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

  <!--Import Google Icon Font-->
  <link href="./src/icon" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="./src/materialize.min.css" media="screen,projection">
  <link rel="stylesheet" href="dist/snackbar.min.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="./src/prism.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="./src/style.css" media="screen" title="no title" charset="utf-8">

</head>

<body>
  <div class="container center">
    <div class="row intro">
      <div class="col s12 logo">
        <img src="./src/logo_large.png" class="img-responsive" alt="Snackbar Logo">
      </div>
      <div class="col s12">
        <h2>Notifications inspired by Google Material Design</h2>
      </div>
      <div class="col s12">
        <hr>
      </div>
      <a href="https://github.com/polonel/snackbar/archive/master.zip" class="waves-effect waves-light btn btn-large download hide-on-small-only">Download</a>
      <div class="col s12">
        <h3>Lets see what it does...</h3>
        <p>Here are basic examples of
          <strong>Snackbar</strong> in action. </p>
        <div class="col s12">
          <button class="waves-effect waves-light btn snackbar" data-pos="top-left">Top Left</button>
          <button class="waves-effect waves-light btn snackbar" data-pos="top-center">Top Center</button>
          <button class="waves-effect waves-light btn snackbar" data-pos="top-right">Top Right</button>
        </div>
        <div class="col s12">
          <button class="waves-effect waves-light btn snackbar" data-pos="bottom-left">Bottom Left</button>
          <button class="waves-effect waves-light btn snackbar" data-pos="bottom-center">Bottom Center</button>
          <button class="waves-effect waves-light btn snackbar" data-pos="bottom-right">Bottom Right</button>

          <div class="row">
            <div class="col s12 m8 offset-m2">
              <pre class=" language-javascript">                  <code class=" language-javascript">
                  Snackbar<span class="token punctuation">.</span><span class="token function">show</span><span class="token punctuation">(</span><span class="token punctuation">{</span>pos<span class="token punctuation">:</span> <span class="token string">'bottom-left'</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span> <span class="token comment" spellcheck="true">//Set the position</span>
                </code>
              </pre>
            </div>
          </div>

          <hr>

          <h4>Action Button</h4>
          <button class="waves-effect waves-light btn snackbar" data-pos="bottom-left" data-showaction="false">No Action</button>
          <button class="waves-effect waves-light btn snackbar" data-pos="bottom-left" data-actiontext="Thanks!">Action Text</button>
          <button class="waves-effect waves-light btn snackbar" data-pos="bottom-left" data-actioncolor="#43a047">Text Color</button>
          <button class="waves-effect waves-light btn snackbar-callback" data-pos="bottom-left">Click Callback</button>
          <br>
          <br>
          <div class="text-left col s10 offset-s1 hide-on-small-only" style="margin-bottom: 35px;">
            <ul class="tabs" style="width: 100%;">
              <li class="tab col s3" style="width: 25%;">
                <a href="https://www.polonel.com/snackbar/#code_no_action" class="active">No Action</a>
              </li>
              <li class="tab col s3" style="width: 25%;">
                <a href="https://www.polonel.com/snackbar/#code_action_text">Action Text</a>
              </li>
              <li class="tab col s3" style="width: 25%;">
                <a href="https://www.polonel.com/snackbar/#code_text_color">Text Color</a>
              </li>
              <li class="tab col s3" style="width: 25%;">
                <a href="https://www.polonel.com/snackbar/#code_click_callback">Click Callback</a>
              </li>
              <div class="indicator" style="right: 571px; left: 0px;"></div>
            </ul>
            <div id="code_no_action">
              <pre class=" language-javascript"><code class=" language-javascript">
                  Snackbar<span class="token punctuation">.</span><span class="token function">show</span><span class="token punctuation">(</span><span class="token punctuation">{</span>
                    showAction<span class="token punctuation">:</span> <span class="token boolean">false</span><span class="token punctuation">,</span>
                    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
                  </code></pre>
            </div>
            <div id="code_action_text" style="display: none;">
              <pre class=" language-javascript"><code class=" language-javascript">
                    Snackbar<span class="token punctuation">.</span><span class="token function">show</span><span class="token punctuation">(</span><span class="token punctuation">{</span>
                      actionText<span class="token punctuation">:</span> <span class="token string">'Thanks!'</span><span class="token punctuation">,</span>
                      <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
                    </code></pre>
            </div>
            <div id="code_text_color" style="display: none;">
              <pre class=" language-javascript"><code class=" language-javascript">
                      Snackbar<span class="token punctuation">.</span><span class="token function">show</span><span class="token punctuation">(</span><span class="token punctuation">{</span>
                        actionTextColor<span class="token punctuation">:</span> <span class="token string">'#ff0000'</span><span class="token punctuation">,</span>
                        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
                      </code></pre>
            </div>
            <div id="code_click_callback" style="display: none;">
              <pre class=" language-javascript">                  <code style="white-space: pre-line !important;" class=" language-javascript">Snackbar<span class="token punctuation">.</span><span class="token function">show</span><span class="token punctuation">(</span><span class="token punctuation">{</span>
                           text<span class="token punctuation">:</span> <span class="token string">'I have a custom callback when action button is clicked.'</span><span class="token punctuation">,</span>
                           width<span class="token punctuation">:</span> <span class="token string">'475px'</span><span class="token punctuation">,</span>
                           onActionClick<span class="token punctuation">:</span> <span class="token keyword">function</span><span class="token punctuation">(</span>element<span class="token punctuation">)</span> <span class="token punctuation">{</span>
                                 <span class="token comment" spellcheck="true">//Set opacity of element to 0 to close Snackbar </span>
                              <span class="token function">   $</span><span class="token punctuation">(</span>element<span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">css</span><span class="token punctuation">(</span><span class="token string">'opacity'</span><span class="token punctuation">,</span> <span class="token number">0</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
                              <span class="token function">   alert</span><span class="token punctuation">(</span><span class="token string">'Clicked Called!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
                             <span class="token punctuation">}</span>
                          <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
                        </code></pre>
            </div>
          </div>

          <div class="row">
            <div class="col s12 m10 offset-m1">
              <hr style="width: 100%">
            </div>
          </div>

          <div class="row download-install" style="margin-bottom: 0;">
            <div class="col s12 m10 offset-m1">
              <h4>Download &amp; Install</h4>
              <div style="margin-bottom: 35px;">
                <h5>
                  <strong>Option 1 - </strong> Bower install:</h5>
                <pre class="sPre">                    $ bower install snackbar
                          </pre>
              </div>

              <div style="margin-bottom: 35px;">
                <h5>
                  <strong>Options 2 - </strong>NPM Install:</h5>
                <pre class="sPre">                    $ npm install node-snackbar
                          </pre>
              </div>

              <h5>
                <strong>Option 3 - </strong>Download
                <strong>CSS</strong> and
                <strong>Javascript</strong> Files:</h5>
              <a href="https://github.com/polonel/snackbar/archive/master.zip" class="waves-effect waves-light btn btn-full">Download Files</a>
            </div>
          </div>

          <div class="col s12 m10 offset-m1">
            <div style="margin-bottom: 35px;">
              <p class="text-left">
                1. Reference the Snackbar javascript and CSS files:
              </p>
              <pre style="white-space: pre-line !important;" class=" language-html">                  <code class=" language-html">
                          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>link</span> <span class="token attr-name">ref</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>stylesheet<span class="token punctuation">"</span></span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>text/css<span class="token punctuation">"</span></span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>dist/snackbar.min.css<span class="token punctuation">"</span></span> <span class="token punctuation">/&gt;</span></span>
                          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>script</span> <span class="token attr-name">src</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>dist/snackbar.min.js<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token script language-javascript"></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>script</span><span class="token punctuation">&gt;</span></span>
                        </code>
                      </pre>
              <p class="text-left">
                2. Call the
                <strong>show()</strong> function on the
                <strong>Snackbar</strong> object when you wish to display a notification.
              </p>
              <pre class=" language-javascript">                  <code style="white-space: pre-line !important;" class=" language-javascript"><span class="token function">$</span><span class="token punctuation">(</span><span class="token string">'.button'</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">click</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
                           Snackbar<span class="token punctuation">.</span><span class="token function">show</span><span class="token punctuation">(</span><span class="token punctuation">{</span>text<span class="token punctuation">:</span> <span class="token string">'Example notification text.'</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
                        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
                      </code>
                    </pre>
            </div>
            <hr style="width: 100%">
          </div>

          <div class="row">
            <div class="col s12 m10 offset-m1">
              <h4 style="margin-bottom: 3px;">configuration</h4>
              <p style="margin-top: 0; margin-bottom: 25px;">Configuration options used to customize each notification.</p>

              <table class="">
                <thead>
                  <tr>
                    <th>
                      <div class="b-left hide-on-med-and-down"></div>Key</th>
                    <th style="width: 20%">Default</th>
                    <th>
                      <div class="b-right hide-on-med-and-down"></div>Description</th>
                  </tr>
                </thead>
                <tbody tabindex="0" style="overflow: hidden; outline: none;">
                  <tr>
                    <td>text</td>
                    <td>
                      <i>null</i>
                    </td>
                    <td>The text to displae inside the notification.</td>
                  </tr>
                  <tr>
                    <td>textColor</td>
                    <td>
                      <i>#FFFFFF</i>
                    </td>
                    <td>Text color of the notification text.
                      <i>Default is white.</i>
                    </td>
                  </tr>
                  <tr>
                    <td>pos</td>
                    <td>
                      <i>bottom-left</i>
                    </td>
                    <td>The position the notification will show. Refer to the examples above for possible positions.</td>
                  </tr>
                  <tr>
                    <td>customClass</td>
                    <td>
                      <i>null</i>
                    </td>
                    <td>Add a custom class to the notification for custom styling.</td>
                  </tr>
                  <tr>
                    <td>width</td>
                    <td>
                      <i>auto</i>
                    </td>
                    <td>Width of the notification. Used to
                      <i>shrink/expand</i> window as you wish.</td>
                  </tr>
                  <tr>
                    <td>showAction</td>
                    <td>
                      <i>true</i>
                    </td>
                    <td>Boolean to show the action buton or not.</td>
                  </tr>
                  <tr>
                    <td>actionText</td>
                    <td>
                      <i>Dismiss</i>
                    </td>
                    <td>Text to display as the action button.</td>
                  </tr>
                  <tr>
                    <td>actionTextAria</td>
                    <td>
                      <i>Dismiss, Description for Screen Readers</i>
                    </td>
                    <td>Text for screen readers.</td>
                  </tr>
                  <tr>
                    <td>alertScreenReader</td>
                    <td>
                      <i>false</i>
                    </td>
                    <td>Determines if screen readers will annouce the snackbar message.</td>
                  </tr>
                  <tr>
                    <td>actionTextColor</td>
                    <td>
                      <i>#4CAF50</i>
                    </td>
                    <td>Text color of the action button.</td>
                  </tr>
                  <tr>
                    <td>backgroundColor</td>
                    <td>
                      <i>#323232</i>
                    </td>
                    <td>Background color of the notification window.</td>
                  </tr>
                  <tr>
                    <td>duration</td>
                    <td>
                      <i>5000</i>
                    </td>
                    <td>Time in milliseconds the notification is displayed before fading out.</td>
                  </tr>
                  <tr>
                    <td>onActionClick</td>
                    <td>
                      <i>function(ele)</i>
                    </td>
                    <td>Default action closes the notification.</td>
                  </tr>
                  <tr>
                    <td>onClose</td>
                    <td>
                      <i>function(ele)</i>
                    </td>
                    <td>Fires when the notification has been closed.</td>
                  </tr>
                </tbody>
              </table>

              <hr style="width: 100%">

            </div>
          </div>

          <div class="row">
            <div class="col s12 m10 offset-m1 footer">
              <a href="https://github.com/polonel" target="_blank">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                  <path d="M12,2A10,10 0 0,0 2,12C2,16.42 4.87,20.17 8.84,21.5C9.34,21.58 9.5,21.27 9.5,21C9.5,20.77 9.5,20.14 9.5,19.31C6.73,19.91 6.14,17.97 6.14,17.97C5.68,16.81 5.03,16.5 5.03,16.5C4.12,15.88 5.1,15.9 5.1,15.9C6.1,15.97 6.63,16.93 6.63,16.93C7.5,18.45 8.97,18 9.54,17.76C9.63,17.11 9.89,16.67 10.17,16.42C7.95,16.17 5.62,15.31 5.62,11.5C5.62,10.39 6,9.5 6.65,8.79C6.55,8.54 6.2,7.5 6.75,6.15C6.75,6.15 7.59,5.88 9.5,7.17C10.29,6.95 11.15,6.84 12,6.84C12.85,6.84 13.71,6.95 14.5,7.17C16.41,5.88 17.25,6.15 17.25,6.15C17.8,7.5 17.45,8.54 17.35,8.79C18,9.5 18.38,10.39 18.38,11.5C18.38,15.32 16.04,16.16 13.81,16.41C14.17,16.72 14.5,17.33 14.5,18.26C14.5,19.6 14.5,20.68 14.5,21C14.5,21.27 14.66,21.59 15.17,21.5C19.14,20.16 22,16.42 22,12A10,10 0 0,0 12,2Z"></path>
                </svg>
              </a>
              <a href="http://www.trudesk.io/" target="_blank">
                <svg style="width:12px;height:24px" viewBox="0 0 12 24">
                  <path class="st0" d="M12,6.5c-0.1,0.7-0.3,1.4-0.7,2.3c-1-0.1-1.9-0.2-2.8-0.2H7.8C6.6,14.5,6,18.2,6,19.6c0,0.8,0.2,1.1,0.5,1.1	c0.3,0,1.2-0.3,2.6-1l0.7,1.3C7.4,23,5.3,24,3.3,24c-0.9,0-1.7-0.3-2.3-0.9c-0.6-0.6-0.9-1.4-0.9-2.3c0-1,0.1-2.1,0.3-3.3	c0.2-1.2,0.5-2.7,0.9-4.5c0.4-1.8,0.7-3.2,0.9-4.3C1.3,8.9,0.6,9,0.1,9.1C0,8.8,0,8.3,0,7.8c0-0.5,0-1,0.1-1.3h2.5	c0.2-1.4,0.3-2.8,0.3-4l0-1.2V1.1C4.9,0.4,6.9,0,8.7,0c0.1,0.5,0.2,1.2,0.2,2c0,0.8-0.2,2.3-0.7,4.5H12z"></path>
                </svg>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script src="./src/modernizr.js" charset="utf-8"></script>
  <script src="./src/jquery-2.2.0.min.js" charset="utf-8"></script>
  <script src="./src/materialize.min.js" charset="utf-8"></script>
  <script src="./src/prism.js" charset="utf-8"></script>
  <script src="../dist/snackbar.min.js" charset="utf-8"></script>
  <script src="./src/init.js" charset="utf-8"></script>
</body>

</html>