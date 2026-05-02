@extends('layouts.app')

@section('title', 'Resume - Muhammad Yahya | Full Stack Engineer')
@section('meta_description', 'View Muhammad Yahya\'s professional resume, experience, education, and skills as a Full Stack Engineer.')

@section('content')
<section id="resume" class="resume section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Resume</h2>
    <p>My professional journey and achievements</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row">

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

        <h3 class="resume-title">Summary</h3>

        <div class="resume-item pb-0">
          <h4>Muhammad Yahya</h4>
          <p><em>Innovative and deadline-driven Full Stack Engineer with 5+ years of experience
          designing and developing user-centered digital solutions from initial concept to final,
          polished deliverable.</em></p>
          <ul>
            <li>Jakarta, Indonesia</li>
            <li>+62 812 3456 7890</li>
            <li>yahya@example.com</li>
          </ul>
        </div>

        <h3 class="resume-title">Education</h3>

        <div class="resume-item">
          <h4>Bachelor of Computer Science</h4>
          <h5>2013 - 2017</h5>
          <p><em>University of Indonesia, Depok</em></p>
          <p>Graduated with honors, specializing in Software Engineering and Web Technologies.
          Final project focused on developing a real-time collaborative coding platform.</p>
        </div>

        <div class="resume-item">
          <h4>Full Stack Web Development Bootcamp</h4>
          <h5>2018</h5>
          <p><em>Hacktiv8 Indonesia</em></p>
          <p>Intensive 4-month program covering modern web development technologies
          including React, Node.js, and cloud deployment.</p>
        </div>

      </div>

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">

        <h3 class="resume-title">Professional Experience</h3>

        <div class="resume-item">
          <h4>Senior Full Stack Engineer</h4>
          <h5>2022 - Present</h5>
          <p><em>TechCorp Indonesia, Jakarta</em></p>
          <ul>
            <li>Lead development of scalable web applications serving 100k+ users</li>
            <li>Architect and implement microservices using Laravel and Node.js</li>
            <li>Mentor junior developers and conduct code reviews</li>
            <li>Optimize application performance resulting in 40% faster load times</li>
          </ul>
        </div>

        <div class="resume-item">
          <h4>Full Stack Developer</h4>
          <h5>2019 - 2022</h5>
          <p><em>StartupXYZ, Jakarta</em></p>
          <ul>
            <li>Developed and maintained multiple client projects using MERN stack</li>
            <li>Implemented CI/CD pipelines reducing deployment time by 60%</li>
            <li>Collaborated with design team to create pixel-perfect user interfaces</li>
            <li>Integrated third-party APIs and payment gateways</li>
          </ul>
        </div>

        <div class="resume-item">
          <h4>Junior Web Developer</h4>
          <h5>2017 - 2019</h5>
          <p><em>Digital Agency ABC, Jakarta</em></p>
          <ul>
            <li>Built responsive websites using HTML, CSS, JavaScript, and PHP</li>
            <li>Worked with WordPress and custom CMS solutions</li>
            <li>Assisted in database design and optimization</li>
            <li>Participated in client meetings and requirement gathering</li>
          </ul>
        </div>

      </div>

    </div>

  </div>

</section><!-- /Resume Section -->

<!-- Skills Section -->
<section id="skills" class="skills section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Skills</h2>
    <p>Technical expertise and competencies</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row skills-content">

      <div class="col-lg-6">

        <div class="progress">
          <span class="skill">HTML <i class="val">100%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>

        <div class="progress">
          <span class="skill">CSS <i class="val">90%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>

        <div class="progress">
          <span class="skill">JavaScript <i class="val">85%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>

        <div class="progress">
          <span class="skill">PHP <i class="val">90%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>

        <div class="progress">
          <span class="skill">Laravel <i class="val">95%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>

      </div>

      <div class="col-lg-6">

        <div class="progress">
          <span class="skill">React <i class="val">80%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>

        <div class="progress">
          <span class="skill">Node.js <i class="val">85%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>

        <div class="progress">
          <span class="skill">MySQL <i class="val">90%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>

        <div class="progress">
          <span class="skill">Docker <i class="val">75%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>

        <div class="progress">
          <span class="skill">AWS <i class="val">70%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>

      </div>

    </div>

  </div>

</section><!-- /Skills Section -->
@endsection

@section('styles')
<style>
  .progress {
    margin-bottom: 20px;
  }

  .progress .skill {
    font-weight: 600;
    color: #222;
    display: block;
    margin-bottom: 5px;
  }

  .progress .skill .val {
    float: right;
    font-style: normal;
    color: #0077b6;
  }

  .progress-bar-wrap {
    background: #f2f2f2;
    border-radius: 10px;
    height: 10px;
    overflow: hidden;
  }

  .progress-bar {
    background: linear-gradient(90deg, #F87B1B, #0077b6);
    height: 10px;
    border-radius: 10px;
    transition: width 1s ease-in-out;
  }
</style>
@endsection