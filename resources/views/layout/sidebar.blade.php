<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Era Utama</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 @if($active == 'dashboard') active @endif" active" aria-current="page" href="{{ route('dashboard.index') }}">
              <svg class="bi"><use xlink:href="#house-door-fill"/></svg>
              Dashboard
            </a>
          </li>
          @can('role', collect(['teacher', 'principal', 'admin']))
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 @if($active == 'teaching-schedules') active @endif" aria-current="page" href="{{ route('teaching-schedules.index') }}">
              <svg class="bi"><use xlink:href="#calendar3"/></svg>
              Teaching Schedule
            </a>
          </li>
          @endcan
          @can('role', collect(['teacher', 'employee', 'principal', 'inspector','admin']))
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 @if($active == 'presences') active @endif" aria-current="page" href="{{ route('presences.index') }}">
              <svg class="bi"><use xlink:href="#easel2"/></svg>
              Presence
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 @if($active == 'salary') active @endif" aria-current="page" href="{{ route('salary.index') }}">
              <svg class="bi"><use xlink:href="#cash"/></svg>
              Salary
            </a>
          </li>
          @endcan
          @can('role', 'foundation')
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 @if($active == 'jobs') active @endif" aria-current="page" href="{{ route('jobs.index') }}">
              <svg class="bi"><use xlink:href="#card-checklist"/></svg>
              Jobs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 @if($active == 'employees') active @endif" aria-current="page" href=" {{ route('employees.index') }} ">
              <svg class="bi"><use xlink:href="#people"/></svg>
              Employees
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 @if($active == 'others') active @endif" aria-current="page" href=" {{ route('others.index') }} ">
              <svg class="bi"><use xlink:href="#list"/></svg>
              Others
            </a>
          </li>
          @endcan
          @can('role', collect(['admin']))
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 @if($active == 'subjects') active @endif" aria-current="page" href="{{ route('subjects.index') }}">
              <svg class="bi"><use xlink:href="#cart"/></svg>
              Subjects
            </a>
          </li>
          @endcan
          @can('role', collect(['foundation', 'admin', 'principal']))
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 @if($active == 'schedules') active @endif" aria-current="page" href="{{ route('schedules.index') }}">
              <svg class="bi"><use xlink:href="#calendar-range-fill"/></svg>
              Schedule
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 @if($active == 'class-advisors') active @endif" aria-current="page" href="{{ route('class-advisors.index') }}">
              <svg class="bi"><use xlink:href="#person-check"/></svg>
              Class Advisor
            </a>
          </li>
          @endcan
          @can('role', 'foundation')
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 @if($active == 'payments') active @endif" aria-current="page" href=" {{ route('payments.index') }} ">
              <svg class="bi"><use xlink:href="#credit-card"/></svg>
              Payment
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