<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamHome — Analytics & Portfolio Dashboard</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
    <style>
        /* Design tokens and theme color palettes */
        :root {
            --accent-green-text: #2e7d32;
            --primary-burgundy: #6b263e;
            --dark-burgundy: #4a1525;
        }
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: #fcf8f6;
            display: flex;
        }
        .sidebar {
            width: 260px;
            background-color: var(--primary-burgundy);
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 20px 0;
            box-sizing: border-box;
        }
        .brand-section {
            padding: 0 24px;
            margin-bottom: 30px;
        }
        .brand-title {
            font-size: 20px;
            font-weight: 700;
            margin: 0;
        }
        .brand-subtitle {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.6);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 2px;
        }
        .sidebar-heading {
            padding: 10px 24px;
            font-size: 11px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.4);
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-top: 15px;
        }
        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 24px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s;
        }
        .nav-link.active, .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
        }
        .erd-footer {
            padding: 20px 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: auto;
            background-color: rgba(0, 0, 0, 0.1);
        }
        .main-content {
            flex-grow: 1;
            padding: 40px;
            width: calc(100% - 260px);
            box-sizing: border-box;
        }
        .dashboard-header h2 {
            color: var(--dark-burgundy);
            margin: 0 0 25px 0;
            font-size: 24px;
            text-transform: capitalize;
        }
        .dashboard-header small {
            font-size: 14px;
            color: #8c767c;
            font-weight: 400;
        }
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: #fff;
            padding: 24px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(74, 21, 37, 0.04);
            border: 1px solid rgba(74, 21, 37, 0.05);
        }
        .stat-label {
            font-size: 13px;
            color: #8c767c;
            font-weight: 500;
        }
        .stat-num {
            font-size: 32px;
            font-weight: 700;
            color: var(--dark-burgundy);
            margin: 8px 0;
        }
        .stat-sub {
            font-size: 12px;
            color: #b09ca1;
        }
        .panel {
            background: #fff;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(74, 21, 37, 0.04);
            margin-bottom: 25px;
        }
        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .panel-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark-burgundy);
        }
        
        /* Interactive Buttons */
        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background-color: var(--primary-burgundy);
            color: #fff;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-action:hover {
            background-color: var(--dark-burgundy);
        }
        .btn-secondary {
            background-color: #f5ebe8;
            color: var(--dark-burgundy);
        }
        .btn-secondary:hover {
            background-color: #ebdcd7;
        }
        
        /* Form Layouts */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .form-group label {
            font-size: 12px;
            font-weight: 600;
            color: #8c767c;
        }
        .form-control {
            padding: 10px;
            border: 1px solid #ebdcd7;
            border-radius: 8px;
            font-size: 14px;
            color: var(--dark-burgundy);
            outline: none;
            background-color: #fcf8f6;
        }
        .form-control:focus {
            border-color: var(--primary-burgundy);
            background-color: #fff;
        }

        /* Tables and Badges */
        .table-container { overflow-x: auto; }
        .data-table { width: 100%; border-collapse: collapse; text-align: left; font-size: 14px; }
        .data-table th { background-color: #fcf8f6; color: var(--dark-burgundy); padding: 14px 16px; font-weight: 600; border-bottom: 2px solid #f5ebe8; }
        .data-table td { padding: 14px 16px; border-bottom: 1px solid #f5ebe8; color: var(--dark-burgundy); }
        .data-table tr:hover { background-color: #faf5f3; }
        .badge-status { display: inline-block; padding: 4px 8px; border-radius: 6px; font-size: 11px; font-weight: 700; }
        .badge-status.available { background: #e8f5e9; color: #2e7d32; }
        .badge-status.rented { background: #efebe9; color: #4e342e; }

        /* General Progress UI components */
        .rule-badge { background: #fff4eb; color: #b76e2e; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; }
        .capacity-list { display: flex; flex-direction: column; gap: 15px; }
        .capacity-item { display: flex; align-items: center; justify-content: space-between; padding-bottom: 12px; border-bottom: 1px solid #f5ebe8; }
        .capacity-info { display: flex; align-items: center; gap: 12px; }
        .initials-circle { width: 36px; height: 36px; border-radius: 50%; background: #fdf2f4; color: var(--primary-burgundy); display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; }
        .name-details h5 { margin: 0; font-size: 14px; color: var(--dark-burgundy); }
        .name-details span { font-size: 11px; color: #a38f94; }
        .progress-box { display: flex; align-items: center; gap: 15px; width: 40%; }
        .progress-container { flex-grow: 1; height: 6px; background: #f5ebe8; border-radius: 3px; overflow: hidden; }
        .progress-fill { height: 100%; background: var(--primary-burgundy); border-radius: 3px; }
        .status-ok { font-size: 11px; font-weight: 700; color: #2e7d32; background: #e8f5e9; padding: 2px 8px; border-radius: 4px; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="brand-section">
            <h1 class="brand-title">DreamHome</h1>
            <div class="brand-subtitle">Enterprise Core Portal</div>
        </div>

        <div class="sidebar-heading">Overview</div>
        <a href="?tab=overview" class="nav-link {{ $currentTab === 'overview' ? 'active' : '' }}">
            <i class="ti ti-layout-dashboard" style="margin-right: 10px; font-size: 18px;"></i> Dashboard
        </a>

        <div class="sidebar-heading">Portfolio Registries</div>
        <a href="?tab=properties" class="nav-link {{ $currentTab === 'properties' || $currentTab === 'add-property' ? 'active' : '' }}">
            <i class="ti ti-building" style="margin-right: 10px; font-size: 18px;"></i> Property Records
        </a>
        <a href="?tab=owners" class="nav-link {{ $currentTab === 'owners' || $currentTab === 'add-owner' ? 'active' : '' }}">
            <i class="ti ti-users" style="margin-right: 10px; font-size: 18px;"></i> Owner Records
        </a>

        <div class="erd-footer">
            <span style="font-size: 10px; text-transform: uppercase; letter-spacing: 1px; color: rgba(255,255,255,0.4); display: block; margin-bottom: 4px;">Relational Schema</span>
            <h4 style="margin: 0; font-size: 13px; font-weight: 600; color: #fff;">Property & Owner ERD</h4>
            <p style="margin: 3px 0 0 0; font-size: 11px; color: rgba(255,255,255,0.6); line-height: 1.3;">Core Entity System Mapping</p>
        </div>
    </div>

    <div class="main-content">
        <div class="dashboard-header">
            <h2>Property Portfolio Workspace <small>> Operational Control</small></h2>
        </div>

        @if($currentTab === 'properties')
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">Master Property Registry</div>
                    <a href="?tab=add-property" class="btn-action">
                        <i class="ti ti-plus"></i> Add New Property
                    </a>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Property ID</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Type</th>
                                <th>Monthly Rent</th>
                                <th>Status</th>
                                <th>Owner</th>
                                <th>Branch / Staff</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($properties as $prop)
                                <tr>
                                    <td><strong>{{ $prop['property_id'] }}</strong></td>
                                    <td>{{ $prop['street'] }}, {{ $prop['area'] }}</td>
                                    <td>{{ $prop['city'] }} <small style="color:#a38f94;">({{ $prop['postcode'] }})</small></td>
                                    <td>{{ $prop['type'] }}</td>
                                    <td>₱{{ number_format($prop['rent']) }}</td>
                                    <td><span class="badge-status {{ strtolower($prop['status']) }}">{{ $prop['status'] }}</span></td>
                                    <td>{{ $prop['owner_name'] }} <small style="color:#a38f94;">({{ $prop['owner_id'] }})</small></td>
                                    <td>{{ $prop['branch_no'] }} / {{ $prop['staff_id'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        @elseif($currentTab === 'add-property')
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">Insert New Property Entry (PostgreSQL Structure)</div>
                    <a href="?tab=properties" class="btn-action btn-secondary">Back to Registry</a>
                </div>
                
                <form action="#" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group"><label>Property ID (Primary Key)</label><input type="text" class="form-control" placeholder="e.g., PA015" required></div>
                        <div class="form-group"><label>Owner ID (Foreign Key)</label><input type="text" class="form-control" placeholder="e.g., CO45" required></div>
                        <div class="form-group"><label>Street Address</label><input type="text" class="form-control" placeholder="e.g., 2 Manor Road" required></div>
                        <div class="form-group"><label>Area</label><input type="text" class="form-control" placeholder="e.g., Hyndland" required></div>
                        <div class="form-group"><label>City</label><input type="text" class="form-control" placeholder="e.g., Glasgow" required></div>
                        <div class="form-group"><label>Postcode</label><input type="text" class="form-control" placeholder="e.g., G12 8QQ" required></div>
                        <div class="form-group">
                            <label>Property Type</label>
                            <select class="form-control">
                                <option>Flat</option>
                                <option>House</option>
                            </select>
                        </div>
                        <div class="form-group"><label>Monthly Rent (PHP ₱)</label><input type="number" class="form-control" placeholder="25000" required></div>
                        <div class="form-group"><label>Branch Number</label><input type="text" class="form-control" placeholder="B001" required></div>
                        <div class="form-group"><label>Staff ID</label><input type="text" class="form-control" placeholder="ST007" required></div>
                    </div>
                    <button type="submit" class="btn-action"><i class="ti ti-database-plus"></i> Save Record to Database</button>
                </form>
            </div>

        @elseif($currentTab === 'owners')
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">Registered Property Owners</div>
                    <a href="?tab=add-owner" class="btn-action">
                        <i class="ti ti-plus"></i> Register Owner
                    </a>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Owner ID</th>
                                <th>Full Name</th>
                                <th>Registered Address</th>
                                <th>Contact Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($owners as $owner)
                                <tr>
                                    <td><strong>{{ $owner['owner_id'] }}</strong></td>
                                    <td>{{ $owner['firt_name'] }} {{ $owner['last_name'] }}</td>
                                    <td>{{ $owner['address'] }}</td>
                                    <td>{{ $owner['phone'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        @elseif($currentTab === 'add-owner')
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">Register New Asset Owner (PostgreSQL Structure)</div>
                    <a href="?tab=owners" class="btn-action btn-secondary">Back to Registry</a>
                </div>
                
                <form action="#" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group"><label>Owner ID (Primary Key)</label><input type="text" class="form-control" placeholder="e.g., CO95" required></div>
                        <div class="form-group"><label>First Name / Company Title</label><input type="text" class="form-control" placeholder="e.g., Tina" required></div>
                        <div class="form-group"><label>Last Name</label><input type="text" class="form-control" placeholder="e.g., Murphy"></div>
                        <div class="form-group"><label>Contact Phone</label><input type="text" class="form-control" placeholder="e.g., 09171234567" required></div>
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;"><label>Full Corporate/Home Address</label><input type="text" class="form-control" placeholder="Bugo, Cagayan de Oro City" required></div>
                    
                    <button type="submit" class="btn-action"><i class="ti ti-database-plus"></i> Complete Registration</button>
                </form>
            </div>

        @else
            <div class="metrics-grid">
                <div class="stat-card">
                    <div class="stat-label">Branches</div>
                    <div class="stat-num">{{ $totalBranches }}</div>
                    <div class="stat-sub">Active offices</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Total Staff</div>
                    <div class="stat-num">{{ $totalStaff }}</div>
                    <div class="stat-sub">All positions</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Supervisors</div>
                    <div class="stat-num">{{ $totalSupervisors }}</div>
                    <div class="stat-sub">Management lines</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Compliance Status</div>
                    <div class="stat-num" style="color: var(--accent-green-text);">{{ $compliance }}%</div>
                    <div class="stat-sub">Within capacity rule</div>
                </div>
            </div>

            <div class="dashboard-layout">
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title">Supervisor Group Capacity</div>
                        <span class="rule-badge">5–10 per group requirement</span>
                    </div>
                    <div class="capacity-list">
                        @foreach($supervisors as $sup)
                            <div class="capacity-item">
                                <div class="capacity-info">
                                    <div class="initials-circle">SV</div>
                                    <div class="name-details">
                                        <h5>{{ $sup['name'] }}</h5>
                                        <span>ID: {{ $sup['id'] }}</span>
                                    </div>
                                </div>
                                <div class="progress-box">
                                    <span class="rule-badge">{{ $sup['branch'] }}</span>
                                    <div class="progress-container">
                                        <div class="progress-fill" style="width: {{ ($sup['count'] / 10) * 100 }}%;"></div>
                                    </div>
                                    <span class="status-ok">OK ({{ $sup['count'] }})</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>

</body>
</html>