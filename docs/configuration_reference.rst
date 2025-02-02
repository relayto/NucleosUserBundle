Configuration reference
=======================

All available configuration options are listed below with their default values.

.. code-block:: yaml

    nucleos_user:
        db_driver:              ~ # Required
        firewall_name:          ~ # Required
        user_class:             ~ # Required
        use_listener:               true
        use_flash_notifications:    true
        model_manager_name:         null  # change it to the name of your entity/document manager if you don't want to use the default one.
        use_authentication_listener: true
        from_email:             ~ # Required
        resetting:
            retry_ttl: 7200 # Value in seconds, logic will use as hours
            token_ttl: 86400
            from_email: # Use this node only if you don't want the global email address for the resetting email
        service:
            mailer:                 nucleos_user.mailer.default
            email_canonicalizer:    nucleos_user.util.canonicalizer.default
            username_canonicalizer: nucleos_user.util.canonicalizer.default
            token_generator:        nucleos_user.util.token_generator.default
            user_manager:           nucleos_user.user_manager.default
        group:
            group_class:    ~ # Required when using groups
            group_manager:  nucleos_user.group_manager.default
        loggedin:
            route: 'nucleos_user_security_loggedin' # Required with 2.0 release
