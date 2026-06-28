module.exports = {
  apps: [
    {
      name: 'suncon',
      script: 'node',
      args: '.next/standalone/server.js',
      cwd: '/var/www/suncon',
      instances: 'max',
      exec_mode: 'cluster',
      env: {
        NODE_ENV: 'production',
        PORT: 3000,
      },
      watch: false,
      max_memory_restart: '512M',
      error_file: './logs/err.log',
      out_file: './logs/out.log',
      log_date_format: 'YYYY-MM-DD HH:mm:ss Z',
    },
  ],
}
