<div class="col-md-4 sidebar">
    <h3 class="sidebar-title">Resources</h3>
    <ul>
        <li><a href="/about">Welcome to That Changed!</a></li>
        <li><a href="/support">Get Support</a></li>
    </ul>
    <br/>
    <div class="sidebar-social">
        <a href="https://twitter.com/that_changed" class="twitter-follow-button" data-show-count="false">Follow @that_changed</a>
        <a href="https://twitter.com/share" class="twitter-share-button" data-via="that_changed">Tweet</a>
    </div>
    {{--<br/>--}}
    {{--<a href="/register"><img class="img-responsive" src="images/setup/three-month-trial.png"></a>--}}
    <br/>
    <h3 class="sidebar-title">Current Features</h3>
    <ul>
        <li>Image based visual differences</li>
        <li>Granular Scheduling</li>
        <li>Simple Setup</li>
        <li>Intuitive Email Notifications</li>
        <li>Slack Notifications</li>
    </ul>
    <br/>
    <h3 class="sidebar-title">Coming Soon</h3>
    <ul>
        <li>Check for the existence of specific text</li>
        <li>Text based visual differences</li>
        <li>Ability to select specific regions to monitor</li>
        <li>Two-Factor Authentication</li>
    </ul>
    @if(Auth::check() && Spark::developer(Auth::user()->email))
        <br/>
        <h3 class="sidebar-title">Admin</h3>
        <ul>
            @if(isset($page))
                <li><a href='{{"/pages/{$page->slug}/edit"}}'>Edit this page</a></li>
            @endif
        </ul>
    @endif
    <br/>
    <br/>
</div>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
