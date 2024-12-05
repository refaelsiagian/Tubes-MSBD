<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Era Utama</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>

      @php
        $role = auth()->user()->role->role;
      @endphp

      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{ url('/'.$role.'/dashboard')}}">
              <svg class="bi"><use xlink:href="#house-add"/></svg>
              Dashboard
            </a>
          </li>
          @can('role', collect(['teacher', 'employee', 'principal', 'inspector','admin']))
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{ url('/'.$role.'/salary')}}">
              <svg class="bi"><use xlink:href="#house-add"/></svg>
              Salary
            </a>
          </li>
          @endcan
          @can('role', 'foundation')
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ route('jobs.index') }}">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              Jobs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href=" {{ route('employees.index') }} ">
              <svg class="bi"><use xlink:href="#people"/></svg>
              Employees
            </a>
          </li>
          @endcan
          @can('role', 'admin')
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ route('subjects.index') }}">
              <svg class="bi"><use xlink:href="#cart"/></svg>
              Subjects
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ route('schedules.index') }}">
              <svg class="bi"><use xlink:href="#cart"/></svg>
              Schedule
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ route('class-advisors.index') }}">
              <svg class="bi"><use xlink:href="#cart"/></svg>
              Class Advisor
            </a>
          </li>
          @endcan
        </ul>

        <hr class="my-3">

        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button class="nav-link d-flex align-items-center gap-2" type="submit">
                <svg class="bi"><use xlink:href="#door-closed"/></svg>
                Sign out
              </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
</div>