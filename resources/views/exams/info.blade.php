<div class="dashboard-container">
    <div class="container mt-5">
        <div class="card user-profile-card">
            <div class="card-body">
                <!-- Header de la tarjeta -->
                <div class="profile-header">
                    <div class="profile-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                    </div>
                    <h2 class="profile-title">Panel del Estudiante</h2>
                    <p class="profile-subtitle">Información personal y acceso al examen</p>
                </div>

                <!-- Mostrar información del usuario -->
                <div class="user-info-section">
                    <div class="info-row">
                        <div class="info-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                            </svg>
                            <span>Nombre:</span>
                        </div>
                        <div class="info-value">{{ $user_name }}</div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                            <span>DIP:</span>
                        </div>
                        <div class="info-value badge-id">{{ $user_ci }}</div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
                                <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                            </svg>
                            <span>Programa:</span>
                        </div>
                        <div class="info-value">{{ $user_career }}</div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                            </svg>
                            <span>Tiempo restante:</span>
                        </div>
                        <div class="info-value time-remaining">
                            <span class="time-display">{{ floor($user_time / 60) }}:{{ str_pad($user_time % 60, 2, '0', STR_PAD_LEFT) }}</span>
                            <span class="time-label">minutos</span>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </svg>
                            <span>Estado:</span>
                        </div>
                        <div class="info-value">
                            <span class="status-badge {{ strtolower($user_status) == 'activo' ? 'status-active' : 'status-inactive' }}">
                                {{ $user_status }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Botón para ir al examen -->
                <div class="action-buttons">
                    <a href="{{ route('exams.index') }}" class="btn-examen">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                        🚀 Comenzar Examen
                    </a>
                    
                    <!-- Botón para cerrar sesión -->
                    <form method="POST" action="{{ route('logout') }}" class="logout-form">
                        @csrf
                        <button type="submit" class="btn-logout">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                            </svg>
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.dashboard-container {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
    padding: 20px 0;
}

.user-profile-card {
    border-radius: 20px;
    border: none;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    max-width: 800px;
    margin: 0 auto;
}

.profile-header {
    text-align: center;
    padding: 30px 20px 20px;
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    color: white;
    margin-bottom: 20px;
}

.profile-icon {
    margin-bottom: 15px;
    color: rgba(255, 255, 255, 0.9);
}

.profile-title {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 5px;
}

.profile-subtitle {
    font-size: 16px;
    opacity: 0.9;
    margin-bottom: 0;
}

.user-info-section {
    padding: 0 25px;
}

.info-row {
    display: flex;
    align-items: center;
    padding: 18px 0;
    border-bottom: 1px solid #f0f0f0;
    transition: background-color 0.2s;
}

.info-row:hover {
    background-color: #f9f9f9;
    border-radius: 8px;
    padding-left: 15px;
    padding-right: 15px;
}

.info-row:last-child {
    border-bottom: none;
}

.info-label {
    display: flex;
    align-items: center;
    width: 180px;
    font-weight: 600;
    color: #555;
}

.info-label svg {
    margin-right: 10px;
    color: #6a11cb;
}

.info-value {
    flex: 1;
    font-size: 16px;
    color: #333;
}

.badge-id {
    background-color: #e9ecef;
    padding: 5px 12px;
    border-radius: 20px;
    font-weight: 600;
    color: #495057;
    font-family: 'Courier New', monospace;
}

.time-remaining {
    display: flex;
    align-items: center;
}

.time-display {
    font-size: 24px;
    font-weight: 700;
    color: #2575fc;
    margin-right: 10px;
    font-family: 'Courier New', monospace;
}

.time-label {
    color: #666;
    font-size: 14px;
}

.status-badge {
    padding: 6px 15px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 14px;
}

.status-active {
    background-color: rgba(40, 167, 69, 0.15);
    color: #28a745;
}

.status-inactive {
    background-color: rgba(220, 53, 69, 0.15);
    color: #dc3545;
}

.action-buttons {
    padding: 30px 25px 20px;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.btn-examen {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    color: white;
    padding: 16px 30px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    font-size: 18px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(37, 117, 252, 0.3);
    border: none;
    cursor: pointer;
}

.btn-examen:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(37, 117, 252, 0.4);
    color: white;
    text-decoration: none;
}

.logout-form {
    margin-top: 10px;
}

.btn-logout {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    background: #f8f9fa;
    color: #495057;
    padding: 14px 30px;
    border: 1px solid #dee2e6;
    border-radius: 12px;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.btn-logout:hover {
    background: #e9ecef;
    color: #dc3545;
    border-color: #dc3545;
}

/* Responsive */
@media (max-width: 768px) {
    .info-row {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .info-label {
        width: 100%;
        margin-bottom: 8px;
    }
    
    .profile-title {
        font-size: 24px;
    }
    
    .btn-examen, .btn-logout {
        padding: 14px 20px;
    }
}
</style>
