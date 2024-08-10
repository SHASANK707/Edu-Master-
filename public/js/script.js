function displayInfo(category, option) {
    const infoDisplay = document.getElementById('info-display');

    // Clear previous content
    infoDisplay.innerHTML = '';

    // Display relevant information based on category and option
    switch (category) {
        case 'student':
            switch (option) {
                case 'profile':
                    infoDisplay.innerHTML = '<h2>Student Profile</h2><p>This is the student\'s profile information.</p>';
                    break;
                case 'grades':
                    infoDisplay.innerHTML = '<h2>Student Grades</h2><p>Display student grades here.</p>';
                    break;
                case 'attendance':
                    infoDisplay.innerHTML = '<h2>Student Attendance</h2><p>Display student attendance information.</p>';
                    break;
            }
            break;
        case 'teacher':
            switch (option) {
                case 'profile':
                    infoDisplay.innerHTML = '<h2>Teacher Profile</h2><p>This is the teacher\'s profile information.</p>';
                    break;
                case 'classes':
                    infoDisplay.innerHTML = '<h2>Classes Taught</h2><p>Display classes taught by the teacher.</p>';
                    break;
                case 'schedule':
                    infoDisplay.innerHTML = '<h2>Teaching Schedule</h2><p>Display teaching schedule information.</p>';
                    break;
            }
            break;
        case 'management':
            switch (option) {
                case 'reports':
                    infoDisplay.innerHTML = '<h2>Management Reports</h2><p>Display management reports here.</p>';
                    break;
                case 'analytics':
                    infoDisplay.innerHTML = '<h2>Analytics</h2><p>Display analytics information.</p>';
                    break;
                case 'settings':
                    infoDisplay.innerHTML = '<h2>Settings</h2><p>Adjust settings here.</p>';
                    break;
            }
            break;
        case 'parents':
            switch (option) {
                case 'children':
                    infoDisplay.innerHTML = '<h2>Children\'s Information</h2><p>Display children\'s information here.</p>';
                    break;
                case 'progress':
                    infoDisplay.innerHTML = '<h2>Children\'s Progress</h2><p>Display children\'s progress information.</p>';
                    break;
                case 'messages':
                    infoDisplay.innerHTML = '<h2>Messages</h2><p>View messages for parents.</p>';
                    break;
            }
            break;
        default:
            infoDisplay.innerHTML = '<h2>Welcome to the Admin Dashboard</h2><p>Select an option from the sidebar to view information.</p>';
            break;
    }
}
