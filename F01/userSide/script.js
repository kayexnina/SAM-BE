const navItems = document.querySelectorAll(".nav-item");
const sections = document.querySelectorAll(".section-content");

navItems.forEach((item) => {
  item.addEventListener("click", () => {
    sections.forEach((section) => {
      section.style.display = "none";
    });

    navItems.forEach((nav) => {
      nav.classList.remove("active");
    });

    const target = item.getAttribute("data-target");
    document.getElementById(target).style.display = "block";

    item.classList.add("active");
  });
});


const currentDate = new Date();
let selectedDate = null;
let events = {};

// month names
const getMonthName = (month) => {
    const monthNames = [
        'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
    ];
    return monthNames[month];
};

const renderCalendar = (month, year) => {
    const calendarElement = document.getElementById('calendar');
    const monthLabel = document.getElementById('monthLabel');
    calendarElement.innerHTML = '';

    // month plus year
    monthLabel.textContent = `${getMonthName(month)} ${year}`;

    const firstDayOfMonth = new Date(year, month, 1);
    const lastDayOfMonth = new Date(year, month + 1, 0);
    const daysInMonth = lastDayOfMonth.getDate();
    const startingDay = firstDayOfMonth.getDay();

    const calendarTable = document.createElement('table');
    calendarTable.classList.add('table', 'table-bordered');
    const tableHeader = document.createElement('thead');
    const tableHeaderRow = document.createElement('tr');

    // days kada week
    ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'].forEach(day => {
        const th = document.createElement('th');
        th.textContent = day;
        tableHeaderRow.appendChild(th);
    });

    tableHeader.appendChild(tableHeaderRow);
    calendarTable.appendChild(tableHeader);

    const tableBody = document.createElement('tbody');
    let currentDay = 1;

    // rows
    for (let i = 0; i < 6; i++) { 
        const tableRow = document.createElement('tr');

        for (let j = 0; j < 7; j++) {
            const tableCell = document.createElement('td');
            if (i === 0 && j < startingDay || currentDay > daysInMonth) {
                tableRow.appendChild(tableCell);
            } else {
                tableCell.textContent = currentDay;
                tableCell.classList.add('calendar-day');
                tableCell.addEventListener('click', () => openEventInput(currentDay, month, year));

                const dateKey = `${year}-${month + 1}-${currentDay}`;
                if (events[dateKey]) {
                    tableCell.classList.add('has-event');
                }
                tableRow.appendChild(tableCell);
                currentDay++;
            }
        }

        tableBody.appendChild(tableRow);
    }

    calendarTable.appendChild(tableBody);
    calendarElement.appendChild(calendarTable);
};

const openEventInput = (day, month, year) => {
    const dateKey = `${year}-${month + 1}-${day}`;
    const eventDescription = prompt('Enter event details for ' + dateKey, events[dateKey] || '');

    if (eventDescription !== null) {
        events[dateKey] = eventDescription;
        renderCalendar(month, year);
    }
};

document.getElementById('prevMonth').addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar(currentDate.getMonth(), currentDate.getFullYear());
});

document.getElementById('nextMonth').addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar(currentDate.getMonth(), currentDate.getFullYear());
});

renderCalendar(currentDate.getMonth(), currentDate.getFullYear());