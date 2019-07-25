node {
    stage('Checkout') {
        git url: 'https://github.com/Raju-17/devops_cert.git'
    }

    stage('Junit') {
        sh '/usr/local/bin/phpunit --log-junit test.xml -c phpunit.xml'
    }
    
    stage('Build') {
        ansiblePlaybook becomeUser: 'root', installation: 'ansible-2.6.1', inventory: '${WORKSPACE}/${env}', playbook: '${WORKSPACE}/selenium.yml', sudoUser: 'root'
    }
    
    stage ("clone repo") {
        checkout scm
    }
    
    stage("build image") {
        app = docker.build("raj170594/node1")
    }
    
    stage("test image"){
        app.inside {
            echo "Test passed"
        }
    }
    
    stage("push image"){
        docker.withRegistry('https://registry.hub.docker.com','docker-key'){
        app.push("${env.BUILD_NUMBER}")
        app.push("latest")
        }
    }
    echo "trying to push docker image to dockerhub"
}
