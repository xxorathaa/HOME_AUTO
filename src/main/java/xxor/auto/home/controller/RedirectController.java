// package xxor.auto.home.controller;

// import org.springframework.beans.factory.annotation.Autowired;
// import org.springframework.core.env.Environment;
// import org.springframework.stereotype.Controller;
// import org.springframework.ui.Model;
// import org.springframework.web.bind.annotation.GetMapping;

// @Controller
// public class IndexController {
    
//     @Autowired
//     private Environment env;

//     @GetMapping("/")
//     public String index(Model model) {
//         model.addAttribute("applicationTitle", env.getProperty("application.title"));
//         return "index";
//     }
// }