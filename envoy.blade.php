@servers(['web' => 'myapp_deployer'])

@task('hello',['on' => ['web']])
HOSTNAME=$(hostname)
echo "HELLO ENVOY! Responding from $HOSTNAME"
@endtask