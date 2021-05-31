# jira-rest-client-bundle

## Installation
```bash
composer require krisstwo/jira-rest-client-bundle
```
Add bundle configuration to the symfony project in `config/packages/jira_rest_client.yaml`:
```yaml
jira_rest_client:
    host: 'https://your-jira.host.com'
    username: 'jira-username'
    token: 'jira-api-token'
    cookie_auth_enabled: ~
    cookie_file: ~
    proxy_host: ~
    proxy_port: ~
    proxy_username: ~
    proxy_password: ~
    use_api_v3: ~
```
## Usage
The bundle exposes the service `JiraRestApi\Issue\IssueService` as `jira_rest_client.issue`