<ul>
    <li><a href="/">Home</a></li>
    <li><a href="about">About Us</a></li>
    <li><a href="contact">Contact Us</a></li>
    <li><a href="users">Users</a></li>
</ul>

<h1>User List</h1>

<ul>
    @foreach ($users as $user)
        <li> {{ $user }} </li>
    @endforeach

</ul>