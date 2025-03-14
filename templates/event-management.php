<?php
$title = 'Event Management';
?>

<?php ob_start(); ?>
<script defer src="../public/assets/js/event-management.js"></script>
<?php $jsFiles = ob_get_clean(); ?>

<?php ob_start(); ?>

<?php $searchButton = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="event-management-page">
  <h1>Event Management</h1>
  <div class="search-bar">
    <input class="app-text-input" type="text" placeholder="Search for events">
    <div class="filter-container">
      <select class="app-select event-date-picker" name="filter" id="filter">
        <option value="all">All</option>
        <option value="upcoming">Upcoming</option>
        <option value="past">Past</option>
      </select>
      <button class="app-button primary search-button">
        <i class="fa-solid fa-magnifying-glass"></i>
        <div>Search</div>
      </button>
    </div>
  </div>
  <h1 class="title">Event List</h1>
  <table id="eventTable" class="table app-table" style="width:100%">
    <thead>
      <tr>
        <th>Event</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Event:</div>
            <div>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Start date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">End date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-action-container">
            <button><i class="fa-solid fa-pen"></i></button>
            <div class="card-divider"></div>
            <button><i class="fa-solid fa-trash"></i></button>
          </div>
          <div class="table-action-container">
            <button class="app-button sm outline-primary">Edit</button>
            <button class="app-button sm outline-danger">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Event:</div>
            <div>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Start date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">End date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-action-container">
            <button><i class="fa-solid fa-pen"></i></button>
            <div class="card-divider"></div>
            <button><i class="fa-solid fa-trash"></i></button>
          </div>
          <div class="table-action-container">
            <button class="app-button sm outline-primary">Edit</button>
            <button class="app-button sm outline-danger">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Event:</div>
            <div>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Start date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">End date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-action-container">
            <button><i class="fa-solid fa-pen"></i></button>
            <div class="card-divider"></div>
            <button><i class="fa-solid fa-trash"></i></button>
          </div>
          <div class="table-action-container">
            <button class="app-button sm outline-primary">Edit</button>
            <button class="app-button sm outline-danger">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Event:</div>
            <div>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Start date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">End date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-action-container">
            <button><i class="fa-solid fa-pen"></i></button>
            <div class="card-divider"></div>
            <button><i class="fa-solid fa-trash"></i></button>
          </div>
          <div class="table-action-container">
            <button class="app-button sm outline-primary">Edit</button>
            <button class="app-button sm outline-danger">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Event:</div>
            <div>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Start date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">End date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-action-container">
            <button><i class="fa-solid fa-pen"></i></button>
            <div class="card-divider"></div>
            <button><i class="fa-solid fa-trash"></i></button>
          </div>
          <div class="table-action-container">
            <button class="app-button sm outline-primary">Edit</button>
            <button class="app-button sm outline-danger">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Event:</div>
            <div>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Start date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">End date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-action-container">
            <button><i class="fa-solid fa-pen"></i></button>
            <div class="card-divider"></div>
            <button><i class="fa-solid fa-trash"></i></button>
          </div>
          <div class="table-action-container">
            <button class="app-button sm outline-primary">Edit</button>
            <button class="app-button sm outline-danger">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Event:</div>
            <div>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Start date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">End date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-action-container">
            <button><i class="fa-solid fa-pen"></i></button>
            <div class="card-divider"></div>
            <button><i class="fa-solid fa-trash"></i></button>
          </div>
          <div class="table-action-container">
            <button class="app-button sm outline-primary">Edit</button>
            <button class="app-button sm outline-danger">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Event:</div>
            <div>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Start date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">End date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-action-container">
            <button><i class="fa-solid fa-pen"></i></button>
            <div class="card-divider"></div>
            <button><i class="fa-solid fa-trash"></i></button>
          </div>
          <div class="table-action-container">
            <button class="app-button sm outline-primary">Edit</button>
            <button class="app-button sm outline-danger">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Event:</div>
            <div>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Start date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">End date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-action-container">
            <button><i class="fa-solid fa-pen"></i></button>
            <div class="card-divider"></div>
            <button><i class="fa-solid fa-trash"></i></button>
          </div>
          <div class="table-action-container">
            <button class="app-button sm outline-primary">Edit</button>
            <button class="app-button sm outline-danger">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Event:</div>
            <div>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Start date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">End date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-action-container">
            <button><i class="fa-solid fa-pen"></i></button>
            <div class="card-divider"></div>
            <button><i class="fa-solid fa-trash"></i></button>
          </div>
          <div class="table-action-container">
            <button class="app-button sm outline-primary">Edit</button>
            <button class="app-button sm outline-danger">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Event:</div>
            <div>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Start date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">End date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-action-container">
            <button><i class="fa-solid fa-pen"></i></button>
            <div class="card-divider"></div>
            <button><i class="fa-solid fa-trash"></i></button>
          </div>
          <div class="table-action-container">
            <button class="app-button sm outline-primary">Edit</button>
            <button class="app-button sm outline-danger">Delete</button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>

</div>
<?php $content = ob_get_clean(); ?>

<?php include '../includes/dashboard-layout.php'; ?>