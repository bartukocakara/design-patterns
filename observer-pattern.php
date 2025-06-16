<?php

// Update system modules when a user’s permission level changes.

interface PermissionSubscriber {
    public function onPermissionChanged(string $newRole): void;
}

class DashboardAccess implements PermissionSubscriber {
    public function onPermissionChanged(string $newRole): void {
        echo "Dashboard Access role changed to ". $newRole. "\n";
        if ($newRole === 'admin') {
            echo "-> Full dashboard access granted\n";
        }
    }
}

class AuditLogger implements PermissionSubscriber {
    public function onPermissionChanged(string $newRole): void{
        echo "Audit Log: Permission changed to ". $newRole. "\n";
    } 
}

class User {
    private array $subscribers = [];

    public function attach(PermissionSubscriber $sub): void {
        $this->subscribers[] = $sub;
    }

    public function changeRole(string $role) : void {
        echo "User role changed to ". $role. "\n";
        foreach($this->subscribers as $subscriber) {
            $subscriber->onPermissionChanged($role);
        };
    }
}

$user = new User();
$user->attach(new DashboardAccess());
$user->attach(new AuditLogger());
$user->changeRole('admin');