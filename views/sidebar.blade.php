<div class="col-md-4 sidebar">
    <h3 class="sidebar-title">Sidebar Heading 1</h3>
    <ul>
        <li>subheading/link 1
        <li>subheading/link 2
    </ul>
    <br/>

    <h3 class="sidebar-title">Sidebar Heading 2</h3>
    <ul>
        <li>subheading/link 1
        <li>subheading/link 2
    </ul>
    <br/>

    <h3 class="sidebar-title">Sidebar Heading 3</h3>
    <ul>
        <li>subheading/link 1
        <li>subheading/link 2
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

